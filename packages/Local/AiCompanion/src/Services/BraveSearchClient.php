<?php

namespace Local\AiCompanion\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class BraveSearchClient
{
    public function search(string $query): string
    {
        $query = $this->normalizeQuery($query);

        if ($query === '' || ! $this->isEnabled()) {
            return '';
        }

        $ttl = max(60, (int) config('ai-companion.search.cache_ttl', 600));

        return Cache::remember(
            $this->cacheKey($query),
            now()->addSeconds($ttl),
            function () use ($query): string {
                return $this->fetchContext($query);
            }
        );
    }

    private function fetchContext(string $query): string
    {
        $apiKey = $this->apiKey();

        if ($apiKey === '') {
            return '';
        }

        $response = Http::timeout((int) config('ai-companion.search.timeout', 12))
            ->acceptJson()
            ->withHeaders([
                'X-Subscription-Token' => $apiKey,
            ])
            ->get('https://api.search.brave.com/res/v1/llm/context', [
                'q' => $query,
            ]);

        if (! $response->successful()) {
            throw new RuntimeException(
                'Brave Search API failed with status ' . $response->status() . ': ' . $response->body()
            );
        }

        return $this->formatContext($response->json(), $query);
    }

    private function formatContext(array $payload, string $query): string
    {
        $sources = data_get($payload, 'grounding.generic', []);

        if (! is_array($sources) || $sources === []) {
            return '';
        }

        $lines = [];

        foreach (array_slice($sources, 0, 4) as $source) {
            if (! is_array($source)) {
                continue;
            }

            $title = trim((string) ($source['title'] ?? ''));
            $url = trim((string) ($source['url'] ?? ''));
            $snippets = $source['snippets'] ?? [];

            if ($title === '' && $url === '') {
                continue;
            }

            $snippet = '';
            if (is_array($snippets) && $snippets !== []) {
                $snippet = trim(strip_tags((string) ($snippets[0] ?? '')));
            }

            $parts = [];
            if ($title !== '') {
                $parts[] = 'Title: ' . $title;
            }
            if ($url !== '') {
                $parts[] = 'URL: ' . $url;
            }
            if ($snippet !== '') {
                $parts[] = 'Snippet: ' . $snippet;
            }

            $lines[] = '- ' . implode(' | ', $parts);
        }

        if ($lines === []) {
            return '';
        }

        return "Brave web search context for query: {$query}\n" . implode("\n", $lines);
    }

    private function cacheKey(string $query): string
    {
        return 'ai-companion:brave-search:' . sha1($query);
    }

    private function normalizeQuery(string $query): string
    {
        return strtolower(trim(preg_replace('/\s+/', ' ', $query) ?? ''));
    }

    private function apiKey(): string
    {
        return trim((string) config('ai-companion.search.brave.api_key', ''));
    }

    private function isEnabled(): bool
    {
        return (bool) config('ai-companion.search.enabled', true);
    }
}

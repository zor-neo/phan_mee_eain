<?php

namespace Local\AiCompanion\Services;

use RuntimeException;
use Illuminate\Support\Facades\Http;

class GeminiClient
{
    private const BRAVE_SEARCH_TOOL = 'brave_search';

    public function __construct(
        private GeminiKeyManager $keyManager
    ) {
    }

    public function generate(string $prompt): string
    {
        $models = $this->getModelsForAttempt();
        $timeout = config('ai-companion.gemini.timeout', 30);
        $keys = $this->keyManager->getKeysForAttempt();

        $lastError = null;

        foreach ($models as $model) {
            foreach ($keys as $apiKey) {
                try {
                    return $this->generateWithKey($prompt, $model, $timeout, $apiKey);
                } catch (RuntimeException $exception) {
                    $lastError = $exception;
                    continue;
                }
            }
        }

        throw new RuntimeException(
            'All Gemini models and API keys failed. Last error: ' .
            ($lastError?->getMessage() ?? 'Unknown error')
        );
    }

    public function generateWithBraveSearchTool(string $prompt, BraveSearchClient $braveSearchClient): string
    {
        if (! $this->isBraveSearchToolAvailable()) {
            return $this->generate($prompt);
        }

        $models = $this->getModelsForAttempt();
        $timeout = config('ai-companion.gemini.timeout', 30);
        $keys = $this->keyManager->getKeysForAttempt();

        $lastError = null;

        foreach ($models as $model) {
            foreach ($keys as $apiKey) {
                try {
                    return $this->generateWithBraveSearchToolAndKey(
                        $prompt,
                        $braveSearchClient,
                        $model,
                        $timeout,
                        $apiKey
                    );
                } catch (RuntimeException $exception) {
                    $lastError = $exception;
                    continue;
                }
            }
        }

        throw new RuntimeException(
            'All Gemini models and API keys failed. Last error: ' .
            ($lastError?->getMessage() ?? 'Unknown error')
        );
    }

    private function getModelsForAttempt(): array
    {
        $primaryModel = config('ai-companion.gemini.model', 'gemini-3.1-flash-lite');
        $fallbackModel = config('ai-companion.gemini.fallback_model');

        $models = [
            $primaryModel,
            $fallbackModel,
        ];

        return array_values(array_unique(array_filter($models, function ($model) {
            return is_string($model) && trim($model) !== '';
        })));
    }

    private function generateWithKey(
        string $prompt,
        string $model,
        int $timeout,
        string $apiKey
    ): string {
        $payload = [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        [
                            'text' => $prompt,
                        ],
                    ],
                ],
            ],
        ];

        return $this->extractText(
            $this->postGenerateContent($payload, $model, $timeout, $apiKey),
            $model
        );
    }

    private function generateWithBraveSearchToolAndKey(
        string $prompt,
        BraveSearchClient $braveSearchClient,
        string $model,
        int $timeout,
        string $apiKey
    ): string {
        $contents = [
            [
                'role' => 'user',
                'parts' => [
                    [
                        'text' => $prompt,
                    ],
                ],
            ],
        ];

        $toolPayload = $this->braveSearchToolPayload();

        $firstResponse = $this->postGenerateContent(
            array_merge(['contents' => $contents], $toolPayload),
            $model,
            $timeout,
            $apiKey
        );

        $functionCall = $this->extractFirstFunctionCall($firstResponse);

        if ($functionCall === null) {
            return $this->extractText($firstResponse, $model);
        }

        if (($functionCall['name'] ?? '') !== self::BRAVE_SEARCH_TOOL) {
            throw new RuntimeException('Gemini requested an unknown tool: ' . ($functionCall['name'] ?? 'unknown'));
        }

        $toolResult = $this->executeBraveSearchTool($functionCall, $braveSearchClient);
        $modelToolCallContent = data_get($firstResponse, 'candidates.0.content');

        if (! is_array($modelToolCallContent)) {
            $modelToolCallContent = [
                'role' => 'model',
                'parts' => [
                    [
                        'functionCall' => $functionCall,
                    ],
                ],
            ];
        }

        $contents[] = $modelToolCallContent;
        $contents[] = [
            'role' => 'user',
            'parts' => [
                [
                    'functionResponse' => $toolResult,
                ],
            ],
        ];

        $finalResponse = $this->postGenerateContent(
            array_merge(['contents' => $contents], $toolPayload),
            $model,
            $timeout,
            $apiKey
        );

        return $this->extractText($finalResponse, $model);
    }

    private function postGenerateContent(
        array $payload,
        string $model,
        int $timeout,
        string $apiKey
    ): array {
        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent";

        $response = Http::timeout($timeout)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'x-goog-api-key' => $apiKey,
            ])
            ->post($url, $payload);

        if (! $response->successful()) {
            throw new RuntimeException(
                'Gemini API request failed for model ' .
                $model .
                ' with status ' .
                $response->status() .
                ': ' .
                $response->body()
            );
        }

        return $response->json();
    }

    private function extractText(array $payload, string $model): string
    {
        $parts = data_get($payload, 'candidates.0.content.parts', []);

        if (! is_array($parts)) {
            $parts = [];
        }

        $text = collect($parts)
            ->pluck('text')
            ->filter(fn ($part) => is_string($part) && trim($part) !== '')
            ->map(fn ($part) => trim($part))
            ->implode("\n");

        if (! is_string($text) || trim($text) === '') {
            throw new RuntimeException(
                'Gemini API returned an empty response for model ' . $model . '.'
            );
        }

        return trim($text);
    }

    private function extractFirstFunctionCall(array $payload): ?array
    {
        $parts = data_get($payload, 'candidates.0.content.parts', []);

        if (! is_array($parts)) {
            return null;
        }

        foreach ($parts as $part) {
            $functionCall = data_get($part, 'functionCall');

            if (is_array($functionCall) && isset($functionCall['name'])) {
                return $functionCall;
            }
        }

        return null;
    }

    private function executeBraveSearchTool(array $functionCall, BraveSearchClient $braveSearchClient): array
    {
        $query = trim((string) data_get($functionCall, 'args.query', ''));

        $response = [
            'query' => $query,
            'context' => 'No live web search context was returned.',
        ];

        if ($query !== '') {
            try {
                $context = trim($braveSearchClient->search($query));

                if ($context !== '') {
                    $response['context'] = $context;
                }
            } catch (\Throwable $exception) {
                report($exception);
                $response['error'] = 'Brave Search was unavailable for this request.';
            }
        }

        $functionResponse = [
            'name' => self::BRAVE_SEARCH_TOOL,
            'response' => $response,
        ];

        $id = data_get($functionCall, 'id');

        if (is_string($id) && trim($id) !== '') {
            $functionResponse['id'] = $id;
        }

        return $functionResponse;
    }

    private function braveSearchToolPayload(): array
    {
        return [
            'tools' => [
                [
                    'functionDeclarations' => [
                        [
                            'name' => self::BRAVE_SEARCH_TOOL,
                            'description' => 'Search the live web for current, recent, time-sensitive, or version-specific facts before answering.',
                            'parameters' => [
                                'type' => 'object',
                                'properties' => [
                                    'query' => [
                                        'type' => 'string',
                                        'description' => 'A concise web search query for the current fact the user needs.',
                                    ],
                                ],
                                'required' => ['query'],
                            ],
                        ],
                    ],
                ],
            ],
            'toolConfig' => [
                'functionCallingConfig' => [
                    'mode' => 'AUTO',
                ],
            ],
        ];
    }

    private function isBraveSearchToolAvailable(): bool
    {
        return (bool) config('ai-companion.search.enabled', true)
            && trim((string) config('ai-companion.search.brave.api_key', '')) !== '';
    }
}

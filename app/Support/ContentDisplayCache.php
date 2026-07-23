<?php

namespace App\Support;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ContentDisplayCache
{
    private const VERSION_KEY = 'phanmeeein.content_display.version';

    public function rememberLatest(array $context, Closure $callback, int $ttlSeconds = 90): mixed
    {
        return Cache::remember(
            $this->key('content.latest', $context),
            now()->addSeconds($ttlSeconds),
            $callback
        );
    }

    public function rememberCards(array $context, Closure $callback, int $ttlSeconds = 120): mixed
    {
        return Cache::remember(
            $this->key('content.cards', $context),
            now()->addSeconds($ttlSeconds),
            $callback
        );
    }

    public function rememberCategories(Closure $callback, int $ttlSeconds = 300): mixed
    {
        return Cache::remember(
            $this->key('content.categories', []),
            now()->addSeconds($ttlSeconds),
            $callback
        );
    }

    public function bumpVersion(): int
    {
        $version = $this->version() + 1;

        Cache::put(self::VERSION_KEY, $version, now()->addYears(5));

        return $version;
    }

    private function key(string $segment, array $context): string
    {
        return sprintf(
            'phanmeeein:%s:v%s:%s',
            $segment,
            $this->version(),
            sha1(json_encode($this->normalizeContext($context), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        );
    }

    private function version(): int
    {
        return (int) Cache::get(self::VERSION_KEY, 1);
    }

    private function normalizeContext(array $context): array
    {
        array_walk($context, function (&$value): void {
            if (is_string($value)) {
                $value = Str::of($value)->squish()->lower()->toString();
            } elseif (is_array($value)) {
                sort($value);
            }
        });

        ksort($context);

        return $context;
    }
}

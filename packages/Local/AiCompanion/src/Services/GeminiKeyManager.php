<?php

namespace Local\AiCompanion\Services;

use RuntimeException;
use Illuminate\Support\Facades\Cache;

class GeminiKeyManager
{
    private string $cacheKey = 'ai_companion.gemini_key_index';

    public function getKeysForAttempt(): array
    {
        $keys = $this->getAvailableKeys();

        if (empty($keys)) {
            throw new RuntimeException('No Gemini API keys are configured.');
        }

        $counter = Cache::increment($this->cacheKey);

        $startIndex = ($counter - 1) % count($keys);

        return array_merge(
            array_slice($keys, $startIndex),
            array_slice($keys, 0, $startIndex)
        );
    }

    public function getAvailableKeys(): array
    {
        $keys = config('ai-companion.gemini.keys', []);

        return array_values(array_filter($keys, function ($key) {
            return is_string($key) && trim($key) !== '';
        }));
    }
}
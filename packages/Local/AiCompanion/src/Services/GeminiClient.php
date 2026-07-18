<?php

namespace Local\AiCompanion\Services;

use RuntimeException;
use Illuminate\Support\Facades\Http;

class GeminiClient
{
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
        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent";

        $response = Http::timeout($timeout)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'x-goog-api-key' => $apiKey,
            ])
            ->post($url, [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $prompt,
                            ],
                        ],
                    ],
                ],
            ]);

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

        $text = data_get($response->json(), 'candidates.0.content.parts.0.text');

        if (! is_string($text) || trim($text) === '') {
            throw new RuntimeException(
                'Gemini API returned an empty response for model ' . $model . '.'
            );
        }

        return trim($text);
    }
}
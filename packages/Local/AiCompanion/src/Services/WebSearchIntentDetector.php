<?php

namespace Local\AiCompanion\Services;

class WebSearchIntentDetector
{
    public function shouldSearch(string $message): bool
    {
        $message = strtolower(trim(preg_replace('/\s+/', ' ', $message) ?? ''));

        if ($message === '') {
            return false;
        }

        $keywords = [
            'latest',
            'current',
            'today',
            "today's",
            'news',
            'trend',
            'trending',
            'recent',
            'recently',
            'update',
            'updated',
            'version',
            'release',
            'pricing',
            'price',
            'cost',
            'compare',
            'comparison',
            'browse',
            'search the web',
            'web search',
            'look up',
        ];

        foreach ($keywords as $keyword) {
            if (str_contains($message, $keyword)) {
                return true;
            }
        }

        return preg_match('/\b(what(\'s| is)? new|up to date|up-to-date|latest version|current version)\b/', $message) === 1;
    }
}

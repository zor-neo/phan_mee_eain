<?php

use Local\AiCompanion\Services\WebSearchIntentDetector;

test('web search detector triggers on current or fresh fact requests', function (string $message) {
    expect(app(WebSearchIntentDetector::class)->shouldSearch($message))->toBeTrue();
})->with([
    'latest news about laravel',
    'what is the current pricing for brave search api',
    'show me the trend for 2026 ai tools',
    'please browse the web for recent release notes',
]);

test('web search detector ignores ordinary learning questions', function () {
    expect(app(WebSearchIntentDetector::class)->shouldSearch('Explain Laravel middleware for a beginner.'))->toBeFalse();
});

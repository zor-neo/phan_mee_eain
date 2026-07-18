<?php

return [
    'enabled' => env('AI_COMPANION_ENABLED', true),

    'provider' => 'gemini',

    'gemini' => [
        'keys' => [
            env('GEMINI_API_KEY_1'),
            env('GEMINI_API_KEY_2'),
            env('GEMINI_API_KEY_3'),
        ],

        'model' => env('AI_COMPANION_MODEL', 'gemini-3.1-flash-lite'),

        'fallback_model' => env('AI_COMPANION_FALLBACK_MODEL', 'gemini-3.5-flash'),

        'timeout' => env('AI_COMPANION_TIMEOUT', 30),
    ],

    'memory' => [
        'driver' => 'session',
        'max_messages' => 20,
    ],

    'routes' => [
        'prefix' => 'ai',
        // 'auth' ensures only logged-in users can reach the Gemini API.
        // This prevents unauthenticated Gemini quota consumption.
        'middleware' => ['web', 'auth'],
        'chat_rate_limit' => 'throttle:10,1',
        'clear_rate_limit' => 'throttle:5,1',
    ],
];

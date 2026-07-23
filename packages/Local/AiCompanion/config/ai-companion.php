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

    'search' => [
        'enabled' => env('AI_COMPANION_SEARCH_ENABLED', true),

        'cache_ttl' => env('AI_COMPANION_SEARCH_CACHE_TTL', 600),

        'timeout' => env('AI_COMPANION_SEARCH_TIMEOUT', 12),

        'brave' => [
            'api_key' => env('BRAVE_SEARCH_API_KEY'),
        ],
    ],

    'memory' => [
        'driver' => 'database',
        'session_key' => 'active_ai_conversation_id',
        'max_messages' => 100,
        'context_messages' => 20,
        'authenticated_retention_days' => 7,
    ],

    'routes' => [
        'prefix' => 'ai',
        'middleware' => ['web'],
        'chat_rate_limit' => 'throttle:10,1',
        'clear_rate_limit' => 'throttle:5,1',
    ],
];

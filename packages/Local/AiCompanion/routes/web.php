<?php

use Illuminate\Support\Facades\Route;
use Local\AiCompanion\Http\Controllers\AiChatController;

if (! config('ai-companion.enabled', true)) {
    return;
}

Route::prefix(config('ai-companion.routes.prefix', 'ai'))
    ->middleware(config('ai-companion.routes.middleware', ['web']))
    ->group(function () {
        Route::get('/session', [AiChatController::class, 'session'])
            ->name('ai-companion.session');

        Route::post('/chat', [AiChatController::class, 'chat'])
            ->middleware(config('ai-companion.routes.chat_rate_limit', 'throttle:10,1'))
            ->name('ai-companion.chat');

        Route::post('/clear', [AiChatController::class, 'clear'])
            ->middleware(config('ai-companion.routes.clear_rate_limit', 'throttle:5,1'))
            ->name('ai-companion.clear');
    });
<?php

namespace Local\AiCompanion;

use Illuminate\Support\ServiceProvider;

class AiCompanionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/ai-companion.php',
            'ai-companion'
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(
            __DIR__ . '/../resources/views',
            'ai-companion'
        );

        $this->publishes([
            __DIR__ . '/../config/ai-companion.php' => config_path('ai-companion.php'),
        ], 'ai-companion-config');

        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/ai-companion'),
        ], 'ai-companion-assets');
    }
}
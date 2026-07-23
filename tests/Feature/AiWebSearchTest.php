<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

uses(RefreshDatabase::class);

test('gemini can request brave search tool before final answer', function () {
    config([
        'ai-companion.gemini.keys' => ['test-gemini-key'],
        'ai-companion.search.brave.api_key' => 'test-brave-key',
    ]);

    Http::fake([
        'api.search.brave.com/res/v1/llm/context*' => Http::response([
            'grounding' => [
                'generic' => [
                    [
                        'title' => 'Laravel Documentation',
                        'url' => 'https://laravel.com/docs',
                        'snippets' => ['Laravel 12 is the current stable release.'],
                    ],
                ],
            ],
        ], 200),
        'generativelanguage.googleapis.com/*' => Http::sequence()
            ->push([
                'candidates' => [
                    [
                        'content' => [
                            'role' => 'model',
                            'parts' => [
                                [
                                    'functionCall' => [
                                        'id' => 'call_1',
                                        'name' => 'brave_search',
                                        'args' => [
                                            'query' => 'latest Laravel version',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ], 200)
            ->push([
                'candidates' => [
                    [
                        'content' => [
                            'parts' => [
                                ['text' => 'Laravel 12 is the current stable release.'],
                            ],
                        ],
                    ],
                ],
            ], 200),
    ]);

    $user = User::factory()->create(['role' => 'user']);

    $response = $this->actingAs($user)->postJson('/ai/chat', [
        'message' => 'What is the latest Laravel version?',
    ]);

    $response->assertOk()
        ->assertJsonPath('reply', 'Laravel 12 is the current stable release.');

    Http::assertSent(function (Request $request): bool {
        return str_contains($request->url(), 'api.search.brave.com/res/v1/llm/context')
            && (($request->data()['q'] ?? null) === 'latest laravel version');
    });

    Http::assertSent(function (Request $request): bool {
        return str_contains($request->url(), 'generativelanguage.googleapis.com/v1beta/models/')
            && str_contains($request->body(), 'functionDeclarations')
            && str_contains($request->body(), 'brave_search');
    });

    Http::assertSent(function (Request $request): bool {
        return str_contains($request->url(), 'generativelanguage.googleapis.com/v1beta/models/')
            && str_contains($request->body(), 'functionResponse')
            && str_contains($request->body(), 'Laravel Documentation')
            && str_contains($request->body(), 'Laravel 12 is the current stable release.');
    });
});

test('gemini can answer directly without running brave search', function () {
    config([
        'ai-companion.gemini.keys' => ['test-gemini-key'],
        'ai-companion.search.brave.api_key' => 'test-brave-key',
    ]);

    Http::fake([
        'generativelanguage.googleapis.com/*' => Http::response([
            'candidates' => [
                [
                    'content' => [
                        'parts' => [
                            ['text' => 'Start with routes, controllers, and views.'],
                        ],
                    ],
                ],
            ],
        ], 200),
    ]);

    $user = User::factory()->create(['role' => 'user']);

    $response = $this->actingAs($user)->postJson('/ai/chat', [
        'message' => 'Explain Laravel MVC for a beginner.',
    ]);

    $response->assertOk()
        ->assertJsonPath('reply', 'Start with routes, controllers, and views.');

    Http::assertSentCount(1);

    Http::assertSent(function (Request $request): bool {
        return str_contains($request->url(), 'generativelanguage.googleapis.com/v1beta/models/')
            && str_contains($request->body(), 'functionDeclarations')
            && str_contains($request->body(), 'brave_search');
    });

    Http::assertNotSent(function (Request $request): bool {
        return str_contains($request->url(), 'api.search.brave.com/res/v1/llm/context');
    });
});

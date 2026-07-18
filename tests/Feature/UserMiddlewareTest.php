<?php

use App\Http\Middleware\UserMiddleware;
use App\Models\User;
use Illuminate\Http\Request;

test('guest users are redirected away from user home', function () {
    $middleware = app(UserMiddleware::class);
    $request = Request::create('/user/home', 'GET');

    $response = $middleware->handle($request, fn () => response('allowed'));
    expect($response->getStatusCode())->toBe(302);
    expect($response->headers->get('Location'))->toBe(url('/login'));
});

test('users can access user home', function () {
    $user = User::factory()->create([
        'role' => 'user',
    ]);

    $this->actingAs($user);
    $middleware = app(UserMiddleware::class);
    $request = Request::create('/user/home', 'GET');

    $response = $middleware->handle($request, fn () => response('allowed'));
    expect($response->getStatusCode())->toBe(200);
    expect($response->getContent())->toContain('allowed');
});

test('authors can access user home', function () {
    $author = User::factory()->create([
        'role' => 'author',
    ]);

    $this->actingAs($author);
    $middleware = app(UserMiddleware::class);
    $request = Request::create('/user/home', 'GET');

    $response = $middleware->handle($request, fn () => response('allowed'));
    expect($response->getStatusCode())->toBe(200);
    expect($response->getContent())->toContain('allowed');
});

test('admins are redirected away from user home', function () {
    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $this->actingAs($admin);
    $middleware = app(UserMiddleware::class);
    $request = Request::create('/user/home', 'GET');

    $response = $middleware->handle($request, fn () => response('allowed'));
    expect($response->getStatusCode())->toBe(302);
    expect($response->headers->get('Location'))->toBe(url('/dashboard'));
});

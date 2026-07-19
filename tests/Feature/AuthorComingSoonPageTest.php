<?php

use App\Models\User;

test('author video lecture placeholder uses professional coming soon copy', function () {
    $author = User::factory()->create([
        'role' => User::ROLE_AUTHOR,
    ]);

    $response = $this->actingAs($author)->get(route('createVContent#Page'));

    $response->assertOk()
        ->assertSee('Coming Soon')
        ->assertSee('Upload Video Lecture Content')
        ->assertSee('Video lecture publishing is planned')
        ->assertDontSee('Opp!')
        ->assertDontSee('not avalible');
});

test('author quiz placeholder uses professional coming soon copy', function () {
    $author = User::factory()->create([
        'role' => User::ROLE_AUTHOR,
    ]);

    $response = $this->actingAs($author)->get(route('createQuize#Page'));

    $response->assertOk()
        ->assertSee('Coming Soon')
        ->assertSee('Create Quiz Test')
        ->assertSee('Quiz creation is planned')
        ->assertDontSee('Opp!')
        ->assertDontSee('not avalible');
});

test('author dashboard names video action as video lecture content', function () {
    $author = User::factory()->create([
        'role' => User::ROLE_AUTHOR,
    ]);

    $response = $this->actingAs($author)->get(route('auther#Room'));

    $response->assertOk()
        ->assertSee('Upload Video Lecture Content')
        ->assertDontSee('Upload Video Content');
});

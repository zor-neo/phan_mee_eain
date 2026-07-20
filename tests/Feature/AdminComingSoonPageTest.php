<?php

use App\Models\User;

test('admin feed placeholder uses professional coming soon copy', function () {
    $admin = User::factory()->create([
        'role' => User::ROLE_ADMIN,
    ]);

    $response = $this->actingAs($admin)->get(route('adminFeed#CreatePage'));

    $response->assertOk()
        ->assertSee('Coming Soon')
        ->assertSee('Create Admin Feed')
        ->assertSee('Admin feed publishing is planned')
        ->assertDontSee('Opp!')
        ->assertDontSee('not avalible');
});

test('admin sidebar links to admin feed placeholder', function () {
    $admin = User::factory()->create([
        'role' => User::ROLE_ADMIN,
    ]);

    $response = $this->actingAs($admin)->get(route('adminHome'));

    $response->assertOk()
        ->assertSee(route('adminFeed#CreatePage'), false)
        ->assertSee('Create Admin Feed');
});

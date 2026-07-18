<?php

use App\Models\User;

test('author profile updates preserve the author role', function () {
    $author = User::factory()->create([
        'role' => User::ROLE_AUTHOR,
    ]);

    $response = $this
        ->actingAs($author)
        ->post('/layout/edit/process', [
            'name' => 'Demo Author',
            'email' => $author->email,
            'phone' => '09123456789',
            'address' => 'Yangon',
            'status' => 'Learning content author',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('profile#Page'));

    expect($author->refresh()->role)->toBe(User::ROLE_AUTHOR);
});

test('superadmin profile updates are protected by role instead of email text', function () {
    $superadmin = User::factory()->create([
        'name' => 'Project Owner',
        'email' => 'owner@example.com',
        'role' => User::ROLE_SUPERADMIN,
    ]);

    $response = $this
        ->actingAs($superadmin)
        ->post('/layout/edit/process', [
            'phone' => '09987654321',
            'address' => 'Mandalay',
            'status' => 'System owner',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('profile#Page'));

    expect($superadmin->refresh()->role)->toBe(User::ROLE_SUPERADMIN);
});

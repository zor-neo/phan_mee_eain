<?php

use App\Models\Category;
use App\Models\Content;
use App\Models\User;

test('reader content cards show expandable controls for long unspaced text', function () {
    $reader = User::factory()->create([
        'role' => User::ROLE_USER,
    ]);
    $author = User::factory()->create([
        'role' => User::ROLE_AUTHOR,
    ]);
    $category = Category::create([
        'name' => 'Languages',
    ]);

    Content::create([
        'title' => 'Long Myanmar Reading',
        'content' => str_repeat('မြန်မာစာရှည်လျားသောအကြောင်းအရာ', 30),
        'role' => 'edu',
        'image' => null,
        'link' => null,
        'user_id' => $author->id,
        'category_id' => $category->id,
    ]);

    $response = $this->actingAs($reader)->get(route('content#Page'));

    $response->assertOk()
        ->assertSee('data-content-toggle', false)
        ->assertSee('See more');
});

test('author content cards show expandable controls for long unspaced text', function () {
    $author = User::factory()->create([
        'role' => User::ROLE_AUTHOR,
    ]);
    $category = Category::create([
        'name' => 'Technology',
    ]);

    Content::create([
        'title' => 'Long Author Draft',
        'content' => str_repeat('နည်းပညာဆိုင်ရာရှည်လျားသောအကြောင်းအရာ', 30),
        'role' => 'kno',
        'image' => null,
        'link' => null,
        'user_id' => $author->id,
        'category_id' => $category->id,
    ]);

    $response = $this->actingAs($author)->get(route('autherContent#Page'));

    $response->assertOk()
        ->assertSee('data-content-toggle', false)
        ->assertSee('See more');
});

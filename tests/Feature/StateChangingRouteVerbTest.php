<?php

use App\Models\User;

test('legacy get mutator routes are no longer available as get requests', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin);

    $this->get('/admins/demote/1')->assertStatus(405);
    $this->get('/admins/promotion/1')->assertStatus(405);
    $this->get('/admins/delete/user/1')->assertStatus(405);
    $this->get('/category/delete/1')->assertStatus(405);
    $this->get('/auther/deleteContent/Process/1')->assertStatus(405);
    $this->get('/content/saveContent/1/1')->assertStatus(405);
});

test('mark seen actions require post requests', function () {
    $author = User::factory()->create(['role' => 'author']);

    $this->actingAs($author);

    $this->get('/auther/comment/mark-seen')->assertStatus(405);
});

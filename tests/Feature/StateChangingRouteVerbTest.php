<?php

use App\Models\User;

test('legacy get mutator routes are no longer available as get requests', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin);

    $this->get('/admins/demote/1')->assertNotFound();
    $this->get('/admins/promotion/1')->assertNotFound();
    $this->get('/admins/delete/user/1')->assertNotFound();
    $this->get('/category/delete/1')->assertNotFound();
    $this->get('/auther/deleteContent/Process/1')->assertNotFound();
    $this->get('/content/saveContent/1/1')->assertNotFound();
});

test('mark seen actions require post requests', function () {
    $author = User::factory()->create(['role' => 'author']);

    $this->actingAs($author);

    $this->get('/auther/comment/mark-seen')->assertNotFound();
});

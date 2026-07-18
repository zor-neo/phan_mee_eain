<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\UserProfileController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Content;
use App\Models\React;
use App\Models\Saved;
use App\Models\User;
use App\Models\promote;
use App\Models\report;
use Illuminate\Http\Request;

function makeOwnershipContent(User $owner): Content
{
    $category = Category::create([
        'name' => 'General',
    ]);

    return Content::create([
        'title' => 'Ownership test content',
        'content' => 'Seed content for ownership checks.',
        'role' => 'edu',
        'image' => 'test-image.jpg',
        'user_id' => $owner->id,
        'category_id' => $category->id,
        'link' => null,
    ]);
}

test('comment ownership comes from the signed-in user', function () {
    $actor = User::factory()->create(['role' => 'user']);
    $spoofed = User::factory()->create();
    $content = makeOwnershipContent($actor);
    $request = Request::create('/content/comment', 'POST', [
        'comment' => 'hello',
        'userId' => $spoofed->id,
        'contentId' => $content->id,
    ]);

    $this->actingAs($actor);
    $response = app(CommentController::class)->commentProcess($request);

    expect($response->getStatusCode())->toBe(200);
    expect(Comment::first()->user_id)->toBe($actor->id);
});

test('report ownership comes from the signed-in user', function () {
    $actor = User::factory()->create(['role' => 'user']);
    $spoofed = User::factory()->create();
    $content = makeOwnershipContent($actor);
    $request = Request::create('/content/report/process', 'POST', [
        'report' => 'issue',
        'userId' => $spoofed->id,
        'contentId' => $content->id,
    ]);

    $this->actingAs($actor);
    $response = app(ReportController::class)->reportProcess($request);

    expect($response->getStatusCode())->toBe(200);
    expect(report::first()->user_id)->toBe($actor->id);
});

test('saved content ownership comes from the signed-in user', function () {
    $actor = User::factory()->create(['role' => 'user']);
    $spoofed = User::factory()->create();
    $content = makeOwnershipContent($actor);
    $this->actingAs($actor);
    $response = app(SavedController::class)->saveContent($spoofed->id, $content->id);

    expect($response->getStatusCode())->toBe(200);
    expect(Saved::first()->user_id)->toBe($actor->id);
});

test('reaction ownership comes from the signed-in user', function () {
    $actor = User::factory()->create(['role' => 'user']);
    $spoofed = User::factory()->create();
    $content = makeOwnershipContent($actor);
    $this->actingAs($actor);
    $response = app(ReactController::class)->reactionProcess($spoofed->id, $content->id, 1);

    expect($response->getStatusCode())->toBe(200);
    expect(React::first()->user_id)->toBe($actor->id);
});

test('promotion requests use the signed-in user', function () {
    $actor = User::factory()->create(['role' => 'user']);
    $spoofed = User::factory()->create();
    $request = Request::create('/layout/promote/process', 'POST', [
        'userId' => $spoofed->id,
        'check1' => 'on',
        'check2' => 'on',
        'check3' => 'on',
        'check4' => 'on',
    ]);

    $this->actingAs($actor);
    $response = app(UserProfileController::class)->promoteProcess($request);

    expect($response->getStatusCode())->toBe(302);
    expect($response->headers->get('Location'))->toContain('/user/home');
    expect(promote::first()->user_id)->toBe($actor->id);
});

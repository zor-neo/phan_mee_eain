<?php

use App\Models\User;
use App\Support\UploadedMedia;
use Illuminate\Support\Facades\Storage;

test('uploaded media route serves files from the configured upload disk', function () {
    config(['filesystems.uploads_disk' => 'uploads-test']);
    Storage::fake('uploads-test');
    Storage::disk('uploads-test')->put('profile/avatar.jpg', 'avatar-body');

    $user = User::factory()->create();

    expect(UploadedMedia::diskName())->toBe('uploads-test');
    expect(UploadedMedia::disk()->exists('profile/avatar.jpg'))->toBeTrue();

    $response = $this->actingAs($user)->get('/media/profile/avatar.jpg');

    $response->assertOk();
    expect($response->streamedContent())->toBe('avatar-body');
});

test('uploaded media helper keeps bundled fallback assets public', function () {
    expect(UploadedMedia::url('content', 'image/logo.jpg', 'content/image/logo.jpg'))
        ->toBe(asset('content/image/logo.jpg'));
});

test('uploaded media route rejects nested file paths', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/media/profile/../secret.txt');

    $response->assertNotFound();
});

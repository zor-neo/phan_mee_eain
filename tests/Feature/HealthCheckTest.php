<?php

use Illuminate\Support\Facades\Storage;

test('health endpoint reports core checks', function () {
    config([
        'filesystems.uploads_disk' => 'uploads-test',
        'filesystems.disks.uploads-test' => [
            'driver' => 'local',
            'root' => storage_path('framework/testing/disks/uploads-test'),
        ],
        'health.storage_write' => false,
    ]);
    Storage::fake('uploads-test');

    $response = $this->get('/health');

    $response->assertOk()
        ->assertJsonPath('status', 'ok')
        ->assertJsonPath('checks.app.status', 'ok')
        ->assertJsonPath('checks.database.status', 'ok')
        ->assertJsonPath('checks.cache.status', 'ok')
        ->assertJsonPath('checks.uploads.status', 'skipped');
});

test('health endpoint can verify upload disk writes when enabled', function () {
    config([
        'filesystems.uploads_disk' => 'uploads-test',
        'filesystems.disks.uploads-test' => [
            'driver' => 'local',
            'root' => storage_path('framework/testing/disks/uploads-test'),
        ],
        'health.storage_write' => true,
    ]);
    Storage::fake('uploads-test');

    $response = $this->get('/health');

    $response->assertOk()
        ->assertJsonPath('checks.uploads.status', 'ok');

    expect(Storage::disk('uploads-test')->allFiles('health'))->toBeEmpty();
});

test('health endpoint reports incomplete s3 upload configuration', function () {
    config([
        'filesystems.uploads_disk' => 's3',
        'filesystems.disks.s3.key' => null,
        'filesystems.disks.s3.secret' => null,
        'filesystems.disks.s3.bucket' => null,
        'filesystems.disks.s3.endpoint' => null,
    ]);

    $response = $this->get('/health');

    $response->assertStatus(503)
        ->assertJsonPath('status', 'degraded')
        ->assertJsonPath('checks.uploads.status', 'fail')
        ->assertJsonPath('checks.uploads.missing', ['key', 'secret', 'bucket', 'endpoint']);
});

<?php

use App\Support\ContentDisplayCache;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

uses(TestCase::class);

test('content display cache bumps a shared version number', function () {
    Cache::shouldReceive('get')
        ->once()
        ->with('phanmeeein.content_display.version', 1)
        ->andReturn(3);

    Cache::shouldReceive('put')
        ->once()
        ->with(
            'phanmeeein.content_display.version',
            4,
            \Mockery::on(fn ($value) => $value instanceof CarbonInterface)
        );

    expect(app(ContentDisplayCache::class)->bumpVersion())->toBe(4);
});

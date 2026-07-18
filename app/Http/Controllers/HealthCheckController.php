<?php

namespace App\Http\Controllers;

use App\Support\UploadedMedia;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Throwable;

class HealthCheckController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $checks = [
            'app' => $this->ok('Application booted.'),
            'database' => $this->databaseCheck(),
            'cache' => $this->cacheCheck(),
            'uploads' => $this->uploadsCheck(),
        ];

        $isHealthy = collect($checks)->every(
            fn (array $check): bool => in_array($check['status'], ['ok', 'skipped'], true)
        );

        return response()->json([
            'status' => $isHealthy ? 'ok' : 'degraded',
            'checked_at' => now()->toIso8601String(),
            'checks' => $checks,
        ], $isHealthy ? 200 : 503);
    }

    private function databaseCheck(): array
    {
        return $this->measure(function (): array {
            DB::select('select 1 as ok');

            return $this->ok('Database responded.');
        });
    }

    private function cacheCheck(): array
    {
        return $this->measure(function (): array {
            $key = 'health:'.bin2hex(random_bytes(8));

            Cache::put($key, 'ok', now()->addMinute());
            $value = Cache::get($key);
            Cache::forget($key);

            if ($value !== 'ok') {
                return $this->fail('Cache write/read check failed.');
            }

            return $this->ok('Cache responded.');
        });
    }

    private function uploadsCheck(): array
    {
        return $this->measure(function (): array {
            $diskName = UploadedMedia::diskName();
            $diskConfig = config("filesystems.disks.{$diskName}");

            if (! is_array($diskConfig)) {
                return $this->fail('Configured upload disk is missing.');
            }

            $missing = $this->missingUploadDiskSettings($diskConfig);

            if ($missing !== []) {
                return $this->fail('Upload disk configuration is incomplete.', [
                    'disk' => $diskName,
                    'missing' => $missing,
                ]);
            }

            if (! config('health.storage_write', false)) {
                return $this->skipped('Upload disk configuration checked. Write check disabled.', [
                    'disk' => $diskName,
                ]);
            }

            $path = 'health/'.bin2hex(random_bytes(8)).'.txt';
            $disk = UploadedMedia::disk();

            $disk->put($path, 'ok');
            $exists = $disk->exists($path);
            $disk->delete($path);

            if (! $exists) {
                return $this->fail('Upload disk write check failed.', [
                    'disk' => $diskName,
                ]);
            }

            return $this->ok('Upload disk write check passed.', [
                'disk' => $diskName,
            ]);
        });
    }

    private function missingUploadDiskSettings(array $diskConfig): array
    {
        if (($diskConfig['driver'] ?? null) !== 's3') {
            return [];
        }

        return collect(['key', 'secret', 'bucket', 'endpoint'])
            ->filter(fn (string $name): bool => blank($diskConfig[$name] ?? null))
            ->values()
            ->all();
    }

    private function measure(callable $callback): array
    {
        $startedAt = microtime(true);

        try {
            $result = $callback();
        } catch (Throwable) {
            $result = $this->fail('Check failed.');
        }

        $result['duration_ms'] = (int) round((microtime(true) - $startedAt) * 1000);

        return $result;
    }

    private function ok(string $message, array $extra = []): array
    {
        return array_merge([
            'status' => 'ok',
            'message' => $message,
        ], $extra);
    }

    private function skipped(string $message, array $extra = []): array
    {
        return array_merge([
            'status' => 'skipped',
            'message' => $message,
        ], $extra);
    }

    private function fail(string $message, array $extra = []): array
    {
        return array_merge([
            'status' => 'fail',
            'message' => $message,
        ], $extra);
    }
}

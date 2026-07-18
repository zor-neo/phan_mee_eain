<?php

namespace App\Http\Controllers;

use App\Support\UploadedMedia;

class MediaController extends Controller
{
    public function show(string $directory, string $path)
    {
        abort_unless(in_array($directory, ['profile', 'content'], true), 404);
        abort_unless(UploadedMedia::isStoredUpload($path), 404);

        $disk = UploadedMedia::disk();
        $storagePath = UploadedMedia::storagePath($directory, $path);

        if (! $disk->exists($storagePath)) {
            $publicFallback = UploadedMedia::publicFallbackPath($directory, $path);

            abort_unless(is_file($publicFallback), 404);

            return response()->file($publicFallback);
        }

        $stream = $disk->readStream($storagePath);
        abort_unless(is_resource($stream), 404);

        return response()->stream(function () use ($stream) {
            fpassthru($stream);
            fclose($stream);
        }, 200, [
            'Cache-Control' => 'private, max-age=3600',
            'Content-Type' => $disk->mimeType($storagePath) ?: 'application/octet-stream',
        ]);
    }
}

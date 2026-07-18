<?php

namespace App\Support;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadedMedia
{
    public const DIRECTORIES = [
        'profile',
        'content',
        'content-resources',
    ];

    public static function diskName(): string
    {
        return config('filesystems.uploads_disk', config('filesystems.default', 'local'));
    }

    public static function disk(): Filesystem
    {
        return Storage::disk(self::diskName());
    }

    public static function store(UploadedFile $file, string $directory): string
    {
        self::ensureAllowedDirectory($directory);

        $fileName = Str::uuid()->toString().'_'.self::safeOriginalName($file);

        self::disk()->putFileAs($directory, $file, $fileName);

        return $fileName;
    }

    public static function storeResource(UploadedFile $file): string
    {
        $fileName = Str::uuid()->toString().'_'.self::safeOriginalName($file);
        $path = 'content-resources/'.$fileName;

        self::disk()->putFileAs('content-resources', $file, $fileName);

        return $path;
    }

    public static function delete(string $directory, ?string $fileName): void
    {
        if (! self::isStoredUpload($fileName)) {
            return;
        }

        self::ensureAllowedDirectory($directory);
        self::disk()->delete($directory.'/'.basename($fileName));
    }

    public static function url(string $directory, ?string $fileName, string $fallbackPath): string
    {
        if (! self::isStoredUpload($fileName)) {
            return asset($fallbackPath);
        }

        self::ensureAllowedDirectory($directory);

        return route('media.show', [
            'directory' => $directory,
            'path' => basename($fileName),
        ]);
    }

    public static function storagePath(string $directory, string $fileName): string
    {
        self::ensureAllowedDirectory($directory);

        return $directory.'/'.basename($fileName);
    }

    public static function publicFallbackPath(string $directory, string $fileName): string
    {
        self::ensureAllowedDirectory($directory);

        return public_path($directory.'/'.basename($fileName));
    }

    public static function isStoredUpload(?string $fileName): bool
    {
        if (! $fileName) {
            return false;
        }

        return ! str_contains($fileName, '/') && ! str_contains($fileName, '\\');
    }

    private static function safeOriginalName(UploadedFile $file): string
    {
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = strtolower($file->getClientOriginalExtension());
        $name = Str::slug($name) ?: 'upload';

        return $extension ? "{$name}.{$extension}" : $name;
    }

    private static function ensureAllowedDirectory(string $directory): void
    {
        abort_unless(in_array($directory, self::DIRECTORIES, true), 404);
    }
}

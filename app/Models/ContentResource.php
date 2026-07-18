<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentResource extends Model
{
    protected $fillable = [
        'content_id',
        'original_name',
        'storage_path',
        'mime_type',
        'extension',
        'size_bytes',
    ];

    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }
}

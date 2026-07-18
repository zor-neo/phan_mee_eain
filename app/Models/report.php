<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $fillable = [
        'role',
        'message',
        'condition',
        'user_id',
        'content_id'
    ];
}

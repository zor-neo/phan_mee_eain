<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    protected $fillable = [
        'user_id',
        'following_id',
    ];
}

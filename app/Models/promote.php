<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promote extends Model
{
    protected $fillable = [
        'user_id',
        'condition'
    ];
}

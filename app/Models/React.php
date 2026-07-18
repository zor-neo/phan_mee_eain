<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class React extends Model
{
    protected $fillable = [
        'react',
        'user_id',
        'content_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

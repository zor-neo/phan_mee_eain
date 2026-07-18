<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\React;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title',
        'content',
        'role',
        'image',
        'link',
        'user_id',
        'category_id',
    ];

    public function reacts(){
            return $this->hasMany(React::class, 'content_id');
        }
    public function likes(){
        return $this->hasMany(React::class, 'content_id')->where('react', 0);
        }

    public function loves(){
        return $this->hasMany(React::class, 'content_id')->where('react', 1);
        }

    public function unlikes(){
        return $this->hasMany(React::class, 'content_id')->where('react', 2);
        }
    public function comments(){
        return $this->hasMany(Comment::class,'content_id');
    }
}

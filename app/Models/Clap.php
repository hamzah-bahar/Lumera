<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Clap extends Model
{
    protected $fillable = ['user_id', 'post_id'];

    public const UPDATED_AT = null;

    // public function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}

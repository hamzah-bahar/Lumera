<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'content', 'category_id', 'image', 'user_id', 'published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function claps()
    {
        return $this->hasMany(Clap::class);
    }

    public function readTime()
    {
        $words = \Illuminate\Support\Str::wordCount($this->content);
        $wordsPerMinute = 150;
        $numberOfMinutes = ceil($words / $wordsPerMinute) < 1 ? 1 : ceil($words / $wordsPerMinute);
        return $numberOfMinutes;
    }

    public function imageUrl()
    {
        if (Str::contains($this->image, 'posts')) {
            return Storage::url($this->image);
        }
        return $this->image;
    }
}

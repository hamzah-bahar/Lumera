<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Post::with('category')->latest()->paginate(9);
        return view('front.articles', ['articles' => $articles]);
    }

    public function show(Post $post)
    {
        $post->load(['user', 'category']);
        return view('front.singleArticle', ['article' => $post]);
    }
}

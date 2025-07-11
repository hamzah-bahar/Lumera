<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $relatedArticles = Post::where('category_id', $post->category_id)->limit(3)->get();
        return view('front.singleArticle', ['article' => $post, 'relatedArticles' => $relatedArticles]);
    }

    public function articlesByCategory(Category $category)
    {
        $posts = $category->posts()->latest()->paginate(9);
        return view('front.articles', ['articles' => $posts]);
    }
}

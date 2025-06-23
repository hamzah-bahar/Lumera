<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $posts = Post::paginate(10);
        } else {
            $posts = Post::where('user_id' == auth()->user()->id)->paginate(10);
        }

        $categories = Category::all();

        return view('dashboard.posts', ['posts' => $posts, 'categories' => $categories]);
    }
}

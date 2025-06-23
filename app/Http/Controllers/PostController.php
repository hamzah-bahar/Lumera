<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $posts = Post::paginate(10);
        } else {
            $posts = Post::where('user_id' == Auth::user()->id)->paginate(10);
        }

        $categories = Category::all();

        return view('dashboard.posts.index', ['posts' => $posts, 'categories' => $categories]);
    }
    public function create()
    {
        return view('dashboard.posts.create');
    }
}

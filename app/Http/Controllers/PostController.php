<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $posts = Post::latest()->paginate(10);
        } else {
            $posts = Post::where('user_id',  Auth::id())
                ->latest()->paginate(10);
        }
        return view('dashboard.posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            "image" => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            "title" => ['required'],
            "content" => ['required'],
            "category_id" => ['required', 'exists:categories,id'],
            "published_at" => ['nullable', 'datetime']
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        $image = $data['image'];
        unset($data['image']);

        $imagePath = $image->store('posts', 'public');

        $data['image'] = Storage::url($imagePath);

        Post::create($data);

        return redirect()->route('dashboard.posts.index');
    }
    public function show(Post $post)
    {
        return view('dashboard.posts.show', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('dashboard.posts.index');
    }
}

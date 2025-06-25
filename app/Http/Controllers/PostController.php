<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use AuthorizesRequests;
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

        $data['image'] = $imagePath;

        Post::create($data);

        return redirect()->route('dashboard.posts.index');
    }

    public function show(Post $post)
    {
        $this->authorize('update', $post);
        return view('dashboard.posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        return view('dashboard.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $image = $post->image;

        $post->fill($request->all());

        $changed = $post->getDirty();
        if (empty($changed)) {
            return redirect()->route('dashboard.posts.index');
        }

        $data = $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($post->isDirty('image')) {
            // remove old image from storage
            if ($image && Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
            $newImage = $data['image'];
            unset($data['image']);
            // store new image
            $imageUrl = $newImage->store('posts', 'public');
            $data['image'] = $imageUrl;
        }

        if ($post->isDirty('title')) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        }
        $post->update($data);

        return redirect()->route('dashboard.posts.index');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('dashboard.posts.index');
    }
}

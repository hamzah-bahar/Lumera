<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);

        Category::create($data);

        return redirect()->route('dashboard.categories.index');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $category->fill($request->all());
        $changes = $category->getDirty();
        if (empty($changes)) {
            return redirect()->route('dashboard.categories.index');
        }

        $data = $request->validate([
            'name' => 'required',
        ]);
        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);

        $category->update($data);

        return redirect()->route('dashboard.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard.categories.index');
    }
}

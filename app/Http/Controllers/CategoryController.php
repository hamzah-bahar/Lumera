<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
}

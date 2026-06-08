<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        Category::create($validated);

        return redirect('/categories');
    }

    public function show(Category $category)
    {
        $category->load('posts');

        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $category->name = $validated['name'];
        $category->save();

        return redirect('/categories/' . $category->id);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories');
    }
}

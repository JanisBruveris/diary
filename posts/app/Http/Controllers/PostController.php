<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $post = Post::create($validated);

        return redirect('/posts/' . $post->id);
    }

    public function show(Post $post)
    {
        $post->load('category', 'comments');

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->category_id = $validated['category_id'];
        $post->save();

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }
}

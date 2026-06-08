<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'author' => ['required', 'max:255'],
            'content' => ['required'],
        ]);

        $validated['post_id'] = $post->id;

        Comment::create($validated);

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Comment $comment)
    {
        $postId = $comment->post_id;

        $comment->delete();

        return redirect('/posts/' . $postId);
    }
}

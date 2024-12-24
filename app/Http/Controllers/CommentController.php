<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'comment_text' => 'required',
            'post_id' => 'required'
        ]);
        $post = Post::find($validated['post_id']);
        $comment = new Comment($validated);
        $comment->user_id = $user->id;
        $comment->user_name = $user->email;
        $comment->save();
        return view('posts.show',compact('post'));

    }

    public function destroy($id)
    {
        $comment =   Comment::findOrFail($id);
        $post = $comment->post;
        $comment->delete();
        return view('posts.show',compact('post'));

    }
}

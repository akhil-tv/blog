<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required',
        ]);
        $post = new Post($validated);
        $post->user_id = auth()->id();
        $post->save();
        return redirect()->route('home')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.update', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validated);

        return redirect()->route('home')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully.');
    }

    public function show($id){

        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    public function myPost()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', $user->id)->paginate(3);
        return view('posts.my_posts',compact('posts'));
    }

}

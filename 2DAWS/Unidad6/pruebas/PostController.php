<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $post = new Post([
            'user_id' => auth()->user()->id,
            'body' => $request->get('body')
        ]);

        $post->save();

        return redirect('/posts')->with('success', 'Post creado exitosamente');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $post->body = $request->get('body');

        $post->save();

        return redirect('/posts')->with('success', 'Post actualizado exitosamente');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('success', 'Post eliminado exitosamente');
    }
}

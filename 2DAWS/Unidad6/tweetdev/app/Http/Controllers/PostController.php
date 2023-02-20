<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Muestra todos las publicaciones que hay
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Te muestra la vista de crear publicacion
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Almacena la publicacion
     */
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

    /**
     * Muestra una publicacion en concreto
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Puedes editar una publicacion
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Puedes actualizar una aplicacion
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $post->body = $request->get('body');

        $post->save();

        return redirect('/posts')->with('success', 'Post actualizado exitosamente');
    }

    /**
     * Eliminar un post
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('success', 'Post eliminado exitosamente');
    }
}

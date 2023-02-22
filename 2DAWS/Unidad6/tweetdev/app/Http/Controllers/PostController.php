<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Almacena la publicacion
     */
    public function store(Request $request)
    {
        // Crear un nuevo post con los datos validados
        $post = new Post();
        $post->message = $request['contenido'];
        $post->user_id = auth()->id();
        $post->user_id = 2;
        $post->save();

        // Redirigir al usuario a la página de la lista de publicaciones
        return redirect()->route('index');
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

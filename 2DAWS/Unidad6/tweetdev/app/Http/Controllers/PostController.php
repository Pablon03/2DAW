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
        // return $post;
        return view('posts.edit', compact('post'));
    }

    /**
     * Puedes actualizar una aplicacion
     */
    public function update(Post $post, Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $post->message = $request->get('content');

        $post->save();

        return redirect(route('index'))->with('success', 'Post actualizado exitosamente');
    }

    /**
     * Eliminar un post
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('index'))->with('success', 'Post eliminado exitosamente');
    }


}
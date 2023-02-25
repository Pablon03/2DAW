<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Muestra una publicacion en concreto
     */
    public function show($user)
    {
        // @dd($user);
        // Debe de coger todos los posts de un usuario y meterlos en una vista
        $posts = Post::where('user_id', $user)
             ->orderBy('created_at', 'desc')
             ->get();
        return view('posts.show', compact('posts'));
    }
}

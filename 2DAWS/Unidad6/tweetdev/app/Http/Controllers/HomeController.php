<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Muestra los últimos posts si el usuario está logueado,
     * si no lo mandará al formulario de logueo
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            // Vista posts
            $this->latestPosts();
        } else {
            return view('auth.login');
        }
    }

    public function latestPosts()
    {
        $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->take(20)->get();
        return view('posts/index-posts', compact('posts'));
    }
}

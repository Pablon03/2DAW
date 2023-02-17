<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class LikeController extends Controller
{
    public function like(Request $request, $post_id)
    {
        $post = Post::find($post_id);

        if (!$post) {
            return redirect()->back()->with('error', 'La publicación a la que intenta dar "me gusta" no existe');
        }

        if (Auth::user()->hasLikedPost($post_id)) {
            return redirect()->back()->with('error', 'Ya has dado "me gusta" a esta publicación');
        }

        $post->likes()->create(['user_id' => Auth::user()->id]);

        return redirect()->back()->with('success', 'Has dado "me gusta" a la publicación');
    }

    public function unlike(Request $request, $post_id)
    {
        $post = Post::find($post_id);

        if (!$post) {
            return redirect()->back()->with('error', 'La publicación a la que intenta quitar el "me gusta" no existe');
        }

        if (!Auth::user()->hasLikedPost($post_id)) {
            return redirect()->back()->with('error', 'No has dado "me gusta" a esta publicación');
        }

        $post->likes()->where('user_id', Auth::user()->id)->delete();

        return redirect()->back()->with('success', 'Has quitado el "me gusta" a la publicación');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'El usuario que intenta seguir no existe');
        }

        if (Auth::user()->id == $user_id) {
            return redirect()->back()->with('error', 'No puedes seguirte a ti mismo');
        }

        if (Auth::user()->isFollowing($user_id)) {
            return redirect()->back()->with('error', 'Ya estás siguiendo a este usuario');
        }

        Auth::user()->follow($user_id);

        return redirect()->back()->with('success', 'Has comenzado a seguir a ' . $user->name);
    }

    public function unfollow(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'El usuario que intenta dejar de seguir no existe');
        }

        if (Auth::user()->id == $user_id) {
            return redirect()->back()->with('error', 'No puedes dejar de seguirte a ti mismo');
        }

        if (!Auth::user()->isFollowing($user_id)) {
            return redirect()->back()->with('error', 'No estás siguiendo a este usuario');
        }

        Auth::user()->unfollow($user_id);

        return redirect()->back()->with('success', 'Has dejado de seguir a ' . $user->name);
    }
}

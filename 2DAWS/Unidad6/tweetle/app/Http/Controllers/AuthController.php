<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Muestra la vista Log In
    public function showLoginForm()
    {
        return view('auth/showLogin');
    }

    // Recoge los datos del Log In para verificar
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }

    // Muestra la vista Registro
    public function showRegistrationForm()
    {
        return view('auth/register');
    }

    // Logica para registrar un nuevo usuario
    public function register(Request $request)
    {
        // Lógica para registrar un nuevo usuario
    }

    // Lógica para desloguear a un usuario
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}


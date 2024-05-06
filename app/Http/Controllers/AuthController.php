<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $nombre_usuario = $request->input('username');
        $contrasena = $request->input('password');
        
        $usuario = Usuario::where('nombre_usuario', $nombre_usuario)->first();
        if ($usuario && password_verify($contrasena, $usuario->contrasena)) {
            Auth::login($usuario);
            return redirect()->intended('/admin');
        }
        return back()->withErrors(['message' => 'Error de inicio de sesión']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

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
            session(['isLoggedIn' => true]);
            return redirect()->intended('/admin');
        }
        return redirect()->intended('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getUserData()
    {
        $usuario = Auth::user();
        if ($usuario) {
            return response()->json([
                'nombre_usuario' => $usuario->nombre_usuario,
                'contrasena' => $usuario->contrasena_plana,
                'id_usuario' => $usuario->id
            ]);
        } else {
            return response()->json(['exito' => False], 401); // fallo de autenticación
        }
    }
}

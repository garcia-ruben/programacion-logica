<?php

namespace App\Http\Controllers;

use App\Mail\AlertLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
            if ($usuario->correo) {
                $this->enviarCorreo($usuario->correo);
            }
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

    public function enviarCorreo($correo)
    {
        $validator = Validator::make(['correo' => $correo], [
            'correo' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        } else {
            Mail::to($correo)->send(new AlertLogin());
            return response()->json([
                'exito' => true,
                'mensaje' => 'Correo enviado exitosamente'
            ]);
        }
    }
}

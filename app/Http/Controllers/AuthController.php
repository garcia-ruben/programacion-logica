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
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|max:255',
        ]);
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
        } elseif ($usuario && $usuario->contrasena_default == (int)$contrasena) {
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
                'nombre' => $usuario->nombre,
                'correo' => $usuario->correo,
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

    public  function retablecerContraseña(REQUEST $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $usuarios = Usuario::where('correo', $request->input('email'))->get();
        if (!$usuarios->isEmpty()) {
            Usuario::where('correo', $request->input('email'))
                ->update([
                    'contrasena' => 12345,
                    'contrasena_plana' => null,
                    'contrasena_default' => 12345,
                    'nombre_usuario' => 'admin'
                ]);
            return response()->json([
                'exito' => true,
                'data' => $usuarios
            ], 200);
        } else {
            return response()->json([
                'exito' => false,
                'data' => 'El correo no existe'
            ], 200);
        }

    }
}

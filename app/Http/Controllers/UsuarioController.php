<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;


class UsuarioController extends Controller
{
    public function actualizarUsuario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'nombre_usuario' => 'required_without_all:nombre,correo|string|max:255', // solo es requerido si no está correp y nombre
            'nombre' => 'string|max:255',
            'correo' => 'email|max:255'
        ]);
        $id = $request->id;
        $nuevoNombre = $request->nombre;
        $nuevoNombreUsuario = $request->nombre_usuario;
        $nuevoCorreo = $request->correo;
        $usuario = Usuario::find($id);
        if ($usuario) {
            if ($request->has('nombre_usuario')) {
                $usuario->nombre_usuario = $nuevoNombreUsuario;
            }
            if ($request->has('nombre')) {
                $usuario->nombre = $nuevoNombre;
            }
            if ($request->has('correo')) {
                $usuario->correo = $nuevoCorreo;
            }
            $usuario->save();
            return response()->json([
                'exito' => true,
                'id' => $usuario->id
            ]);
        } else {
            return response()->json(['exito' => false]);
        }
    }

    public function actualizarContraseña(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'contrasena' => 'required|string|max:255'
        ]);
        $id = $request->id;
        $nuevaContrasena = $request->contrasena;

        $usuario = Usuario::find($id);
        if ($usuario) {
            $usuario->contrasena_plana = $nuevaContrasena;
            if ($nuevaContrasena == "admin") {
                $usuario->contrasena_default = 12345;
            } else {
                $usuario->contrasena_default = NULL;
            }
            $usuario->contrasena =  Hash::make($nuevaContrasena); ;
            $usuario->save();
            return response()->json([
                'exito' => true,
                'id' => $usuario->id
            ]);
        } else {
            return response()->json(['exito' => false]);
        }
    }

    public function agregarUsuario(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'contrasena' => 'required|string|max:255',
            'rol_id' => 'required|integer'
        ]);
        $usuario = new Usuario();
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->rol_id = $request->rol_id;
        if ($request->contrasena == "admin") {
            $usuario->contrasena_default = 12345;
        } else {
            $usuario->contrasena_default = NULL;
        }
        $usuario->contrasena_plana = $request->contrasena;
        $usuario->contrasena = Hash::make($request->contrasena);
        try {
            $usuario->save();
            return response()->json([
                'exito' => true,
                'id' => $usuario->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'exito' => false,
                'mensaje' => 'Error al agregar el cliente: ' . $e->getMessage()
            ]);
        }
    }
}

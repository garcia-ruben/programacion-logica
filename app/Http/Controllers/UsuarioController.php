<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $mensajeCorreo = "";
        $mensajeUsuario = "";
        $mensajeNombre = "";
        $usuario = Usuario::find($id);
        $usuarioExistente = Usuario::select('id')
            ->where('nombre_usuario', $nuevoNombreUsuario)
            ->orWhere('correo', $nuevoCorreo)
            ->first();
        if ($usuario) {
            if ($request->has('nombre_usuario')) {
                if ($usuario->nombre_usuario != $nuevoNombreUsuario) {
                    if ($usuarioExistente){
                        $mensajeUsuario = "El nombre de usuario ya está en uso";
                    } else {
                        $usuario->nombre_usuario = $nuevoNombreUsuario;
                        $mensajeUsuario = 'success';
                    }
                } else {
                    $mensajeUsuario = "same value";
                }
            }
            if ($request->has('nombre')) {
                if ($usuario->nombre != $nuevoNombre) {
                    $usuario->nombre = $nuevoNombre;
                    $mensajeNombre = 'success';
                } else {
                    $mensajeNombre = "same value";
                }
            }
            if ($request->has('correo')) {
                if ($usuario->correo != $nuevoCorreo) {
                    if ($usuarioExistente){
                        $mensajeCorreo = "El correo electronico ya esta en uso";
                    } else {
                        $usuario->correo = $nuevoCorreo;
                        $mensajeCorreo = 'success';
                    }
                } else {
                    $mensajeCorreo = "same value";
                }
            }
            $usuario->save();

            return response()->json([
                'exito' => true,
                'nombre' => $mensajeNombre,
                'correo' => $mensajeCorreo,
                'nombre_usuario' => $mensajeUsuario,
            ]);
        } else {
            return response()->json(['exito' => false]);
        }
    }

    public function actualizarContraseña(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'contrasena' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'exito' => false,
                'error' => $validator->errors()->all()
            ], 200);
        }

        $id = $request->id;
        $nuevaContrasena = $request->contrasena;

        $usuario = Usuario::find($id);
        if ($usuario) {
            $usuario->contrasena_plana = $nuevaContrasena;
            $usuario->contrasena_default = Hash::make($nuevaContrasena);
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

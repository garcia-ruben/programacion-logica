<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class UsuarioController extends Controller
{
    public function actualizarNombreUsuario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'nombre_usuario' => 'required|string|max:255'
        ]);
        $id = $request->id;
        $nuevoNombre = $request->nombre_usuario;

        $usuario = Usuario::find($id);
        if ($usuario) {
            $usuario->nombre_usuario = $nuevoNombre;
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
            $usuario->contrasena_default = NULL;
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OpcionesController
{
    public function obtenerDatosOpciones()
    {
        $opciones = Opcion::all();
        $producto = Opcion::join('productos', 'opciones.producto_id', '=', 'productos.id')
            ->select('productos.id', 'productos.nombre as producto')
            ->get();
        if ($opciones) {
            return response()->json([
                'exito' => true,
                'data' => $opciones,
                'producto' => $producto
            ]);
        } else {
            return response()->json(['exito' => false]);
        }
    }
    public function obtenerTiempo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'integer'
        ]);
        if ($validator->fails()) {
            return response()->json(['exito' => false, 'mensaje' => $validator->errors()], 400);
        }

        $id = $request->input('id');
        $tiempo = Opcion::where('id', $id)
            -> select('tiempo')
            ->first();
        if ($tiempo) {
            return response()->json(['exito' => true, 'tiempo' => $tiempo]);
        } else {
            return response()->json(['exito' => false]);
        }
    }
}

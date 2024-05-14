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

    public function guardarOpcion(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'producto_id' => 'required|integer',
            'tiempo' => 'required|regex:/^([0-5]?[0-9]):([0-5]?[0-9])$/',
            'precio' => 'required|numeric|regex:/^\d{1,6}(\.\d{1,2})?$/',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'exito' => false,
                'error' => $validator->errors()->all()
            ], 200);
        }

        $option = Opcion::find($request->input('id'));
        $option->producto_id = $request->input('producto_id');

        // Convertir el tiempo de mm:ss a HH:MM:SS para MySQL
        $tiempo = $request->input('tiempo');
        list($minutos, $segundos) = explode(':', $tiempo);
        $tiempo_mysql = sprintf('00:%02d:%02d', $minutos, $segundos);
        $option->tiempo = $tiempo_mysql;

        $option->precio = $request->input('precio');

        try {
            $option->save();
            return response()->json([
                'exito' => true,
                'id' => $option->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'exito' => false,
                'mensaje' => 'Error al actualizar opción: ' . $e->getMessage()
            ]);
        }
    }
}

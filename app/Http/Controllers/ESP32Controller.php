<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ESP32Controller
{
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

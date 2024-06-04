<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ESP32Controller
{
    public function guardarOpcion(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'producto' => 'required||string|max:5',
            #'tiempo' => 'required|regex:/^([0-9]{2}):([0-5]?[0-9]):([0-5]?[0-9])$/',
            'precio' => 'required|integer',
        ]);
        $precio_string = strval($request->input('precio'));
        $precio = number_format($precio_string, 2, '.', '');
        if ($validator->fails()) {
            return response()->json([
                'exito' => false,
                'error' => $validator->errors()->all()
            ], 200);
        }

        $option = Opcion::find($request->input('id'));
        $option->opcion = $request->input('producto');

        // Convertir el tiempo de mm:ss a HH:MM:SS para MySQL
        #$tiempo = $request->input('tiempo');
        #list($horas, $minutos, $segundos) = explode(':', $tiempo);
        #$tiempo_mysql = sprintf('00:%02d:%02d', $horas, $minutos, $segundos);
        #$option->tiempo = $tiempo_mysql;

        $option->precio = $request->input($precio);

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

    public function obtenerDatosOpciones()
    {
        $opciones = Opcion::all();
        if ($opciones) {
            return response()->json([
                'exito' => true,
                'opciones' => $opciones
            ]);
        } else {
            return response()->json(['exito' => false]);
        }
    }

    public function registraConsumo(Request $request)
    {
        $request->validate([
            'opcion_id' => 'required|integer',
            'precio' => 'required|numeric',
            'opcion' => 'required||string|max:5'
        ]);

        try {
            $venta = new Venta();
            $venta->opcion_id = $request->opcion_id;
            $venta->fecha = now()->toDateString();
            $venta->precio_actual = $request->precio;
            $venta->opcion = $request->opcion;
            $venta->save();

            return response()->json([
                'exito' => true,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'exito' => false,
                'mensaje' => 'Error al registrar venta: ' . $e->getMessage()
            ]);
        }
    }

    public function getToken()
    {
        $token = csrf_token();
        return response()->json(['csrf_token' => $token]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ESP32Controller
{
    public function actualizaPrecio(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
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
        $option->precio = $precio;

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

    public function actualizaTiempo(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'tiempo' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'exito' => false,
                'error' => $validator->errors()->all()
            ], 200);
        }
        $horas = "00";
        $minutos = "00";
        $segundos = $request->input('tiempo');
        $segundos_format = str_pad($segundos, 2, '0', STR_PAD_LEFT);
        $tiempo_mysql = sprintf('00:%02d:%02d', $horas, $minutos, $segundos_format);

        $option = Opcion::find($request->input('id'));
        $option->opcion = $request->input('producto');
        $option->tiempo = $tiempo_mysql;

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
        $validator = Validator::make($request->all(), [
            'opcion_id' => 'required|integer',
            'precio' => 'required|numeric',
            'opcion' => 'required||string|max:5'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'exito' => false,
                'error' => $validator->errors()->all()
            ], 200);
        }
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
}
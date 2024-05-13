<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class HistoryController
{
    public function datosHistorial(Request $request)
    {
        $historial = Venta::all();
        $producto = Venta::join('productos', 'ventas.producto_id', '=', 'productos.id')
            ->select('productos.id', 'productos.nombre as producto')
            ->get();
        if ($historial) {
        return response()->json([
            'exito' => true,
            'data' => $historial,
            'producto' => $producto
        ]);
        } else {
            return response()->json(['exito' => false]);
        }
    }

    public function filtarHistorico(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y|after_or_equal:start_date',
        ]);

        if ($validator->passes()) {
            $startDate = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');

            $ventas = Venta::join('productos', 'ventas.producto_id', '=', 'productos.id')
                ->select('productos.id', 'productos.nombre as producto')
                ->whereBetween('ventas.created_at', [$startDate, $endDate])
                ->get();

            return response()->json([
                'exito' => true,
                'datos' => $ventas]);
        } else {
            return response()->json([
                'exito' => false,
                'mensaje' => $validator->errors()
        ]);
        }
    }
}

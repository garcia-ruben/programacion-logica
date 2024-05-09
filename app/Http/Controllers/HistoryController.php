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
        $request->validate([
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y|after_or_equal:start_date',
        ]);

        $startDate = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        $endDate = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');

        $ventas = Venta::join('productos', 'ventas.producto_id', '=', 'productos.id')
            ->select('productos.id', 'productos.nombre as producto')
            ->whereBetween('ventas.created_at', [$startDate, $endDate])
            ->get();

        return response()->json($ventas);
    }


    public function saa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);
        if ($validator->fails()) {
            return response()->json(['exito' => false, 'mensaje' => $validator->errors()], 400);
        }
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $startDate = $startDate ? Carbon::parse($startDate)->startOfDay() : null;
        $endDate = $endDate ? Carbon::parse($endDate)->endOfDay() : null;

        $query = Venta::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        } elseif ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }
        dd($query->toSql());
        $historial = $query->get();
        return response()->json([
            'exito' => true,
            'data' => $historial
        ]);
    }
}

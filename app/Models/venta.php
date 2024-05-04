<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

    use HasFactory;
    protected $fillable = [
        'opcion_id',
        'producto_id',
        'fecha',
        'precio_actual'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function opcion()
    {
        return $this->belongsTo(Opcion::class);
    }
}

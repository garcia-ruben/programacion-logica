<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use HasFactory;

    public function getAuthPassword()
    {
        return $this->contrasena;
    }
    protected $fillable = [
        'nombre_usuario',
        'contrasena',
        'correo',
        'contrasena_default',
        'rol_id'
    ];
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
}
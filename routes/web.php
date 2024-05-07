<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// rutas protegidas si no se inicia sesión
use App\Http\Middleware\RedirectIfAuthenticated;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

    Route::get('/historial/historico', function () {
        return view('historial');
    })->name('historial');

    Route::get('/historial/grafico', function () {
        return view('historial');
    })->name('historial');

    Route::get('/opciones', function () {
        return view('opciones');
    })->name('opciones');
});

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/ajax-usuario', [AuthController::class, 'getUserData']);
Route::get('/ajax-upd-nombre', [\App\Http\Controllers\UsuarioController::class, 'actualizarNombreUsuario']);
Route::get('/ajax-upd-contrasena', [\App\Http\Controllers\UsuarioController::class, 'actualizarContraseña']);

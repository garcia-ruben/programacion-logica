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
Route::get('/ajax_usuario', [AuthController::class, 'getUserData']);
Route::post('/ajax_upd_nombre', [\App\Http\Controllers\UsuarioController::class, 'actualizarUsuario'])->name('actualizar-usuario');
Route::post('/ajax_upd_contrasena', [\App\Http\Controllers\UsuarioController::class, 'actualizarContraseña'])->name('actualizar-contrasena');
Route::post('/ajax_agregar_user', [\App\Http\Controllers\UsuarioController::class, 'agregarUsuario'])->name('agregar-usuario');
Route::get('/ajax_historial', [\App\Http\Controllers\HistoryController::class, 'datosHistorial'])->name('obtener-datos-historial');
Route::get('/ajax_filtro', [\App\Http\Controllers\HistoryController::class, 'filtarHistorico'])->name('filtrar-datos-historial');


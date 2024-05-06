<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('login');
});

Route::get('/historial/historico', function () {
    return view('historial');
});

Route::get('/historial/grafico', function () {
    return view('historial');
});

Route::get('/opciones', function () {
    return view('opciones');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

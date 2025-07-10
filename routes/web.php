<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CultivoController;
use App\Http\Controllers\Api\AuthController;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas con autenticación y verificación de email
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Ruta del dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para el módulo de cultivos
    Route::get('/cultivos/formcultivo', [CultivoController::class, 'create'])->name('cultivos.create');
    Route::post('/cultivos', [CultivoController::class, 'store'])->name('cultivos.store');
    Route::get('/index', [CultivoController::class, 'index'])->name('cultivos.index');
    Route::put('/cultivos/{id}', [CultivoController::class, 'update'])->name('cultivos.update');
    Route::delete('/cultivos/{id}', [CultivoController::class, 'destroy'])->name('cultivos.destroy');
});


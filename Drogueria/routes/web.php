<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\TiposProductosController;
use Illuminate\Support\Facades\Route;

// Página principal → login o bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Dashboard protegido
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por login
Route::middleware(['auth'])->group(function () {

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 👉 CRUD Tipos de Producto
    Route::resource('TiposProductos', TiposProductosController::class)
    ->parameters(['TiposProductos' => 'tiposProducto']);

    // 👉 CRUD Productos
    Route::resource('Productos', ProductosController::class)
    ->parameters(['Productos' => 'producto']);
});

require __DIR__.'/auth.php';

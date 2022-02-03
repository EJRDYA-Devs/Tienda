<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');

    //RUTAS DE PRODUCTOS, CATEGORIAS Y TRANSACCIONES
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/productos', [\App\Http\Controllers\Admin\ProductoController::class, 'index'])->name('admin.productos.index');
    Route::get('/categorias', [\App\Http\Controllers\Admin\CategoriaController::class, 'index'])->name('admin.categorias.index');

    Route::get('/transacciones', [\App\Http\Controllers\Admin\TransaccionController::class, 'index'])->name('admin.transacciones.index');
});

<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    Route::get('/mi-perfil', [\App\Http\Controllers\Admin\AdminController::class, 'perfil'])->name('admin.perfil.me');

    //RUTAS DE CLIENTES, PROVEEDORES Y USUARIOS
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
});

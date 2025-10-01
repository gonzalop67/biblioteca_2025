<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermisoController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, 'index']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    /*RUTAS DEL MENU*/
    Route::get('permiso', [PermisoController::class, 'index'])->name('permiso');
    Route::get('permiso/crear', [PermisoController::class, 'crear'])->name('permiso.crear');
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
    Route::get('menu/crear', [MenuController::class, 'crear'])->name('menu.crear');
    Route::post('menu', [MenuController::class, 'guardar'])->name('menu.guardar');
    Route::get('menu/{id}/editar', [MenuController::class, 'editar'])->name('menu.editar');
    Route::put('menu/{id}', [MenuController::class, 'actualizar'])->name('menu.actualizar');
    Route::get('menu/{id}/eliminar', [MenuController::class, 'eliminar'])->name('menu.eliminar');
    Route::post('menu/guardar-orden', [MenuController::class, 'guardarOrden'])->name('guardar_orden');
    /*RUTAS ROL*/
    Route::get('rol', [RolController::class, 'index'])->name('rol');
    Route::get('rol/crear', [RolController::class, 'crear'])->name('rol.crear');
    Route::post('rol', [RolController::class, 'guardar'])->name('rol.guardar');
    Route::get('rol/{id}/editar', [RolController::class, 'editar'])->name('rol.editar');
    Route::put('rol/{id}', [RolController::class, 'actualizar'])->name('rol.actualizar');
    Route::delete('rol/{id}', [RolController::class, 'eliminar'])->name('rol.eliminar');
});
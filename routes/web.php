<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuRolController;
use App\Http\Controllers\Admin\PermisoController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\Seguridad\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, 'index'])->name('inicio');

Route::get('seguridad/login', [LoginController::class, 'index'])->name('login');
Route::post('seguridad/login', [LoginController::class, 'login'])->name('login_post');
Route::post('seguridad/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function(){
    Route::get('', [AdminController::class,'index'])->name('admin');
    /*RUTAS DE PERMISO*/
    Route::get('permiso', [PermisoController::class, 'index'])->name('permiso');
    Route::get('permiso/crear', [PermisoController::class, 'crear'])->name('crear_permiso');
    Route::post('permiso', [PermisoController::class, 'guardar'])->name('guardar_permiso');
    Route::get('permiso/{id}/editar', [PermisoController::class, 'editar'])->name('editar_permiso');
    Route::put('permiso/{id}', [PermisoController::class, 'actualizar'])->name('actualizar_permiso');
    Route::delete('permiso/{id}', [PermisoController::class, 'eliminar'])->name('eliminar_permiso');
    /*RUTAS DEL MENU*/
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
    /*RUTAS MENU_ROL*/
    Route::get('menu-rol', [MenuRolController::class, 'index'])->name('menu_rol');
    Route::post('menu-rol', [MenuRolController::class, 'guardar'])->name('guardar_menu_rol');
});
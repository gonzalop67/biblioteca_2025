<?php

use App\Http\Controllers\Admin\PermisoController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, 'index']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::get('permiso', [PermisoController::class, 'index'])->name('permiso');
    Route::get('permiso/crear', [PermisoController::class, 'create'])->name('permiso.crear');
});
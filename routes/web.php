<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;

// Route::get('/', function () {
//     return view('inicio');
// });

Route::get('/', [InicioController::class, 'index']);
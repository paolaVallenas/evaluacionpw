<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/registro', [RegistroController::class, 'mostrarFormulario'])->name('registro.form');
Route::post('/registro', [RegistroController::class, 'procesarRegistro'])->name('registro.procesar');

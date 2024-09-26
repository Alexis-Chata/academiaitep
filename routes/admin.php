<?php

use Illuminate\Support\Facades\Route;

#dashboard principal
Route::view("/", "administrador.index")->name("tablero");
#carreras
Route::view("carreras", "administrador.carreras.index_carrera")->name("carreras.index");
Route::view("pagos", "administrador.pagos.pagos_index")->name("pagos.index");

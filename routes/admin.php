<?php

use Illuminate\Support\Facades\Route;

#index principal
Route::view("index", "administrador.index")->name("tablero");
#carreras
Route::view("carreras/index", "administrador.carreras.index_carrera")->name("carreras.index");

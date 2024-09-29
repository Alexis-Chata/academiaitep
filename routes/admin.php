<?php

use Illuminate\Support\Facades\Route;

#dashboard principal
Route::view("/", "administrador.index")->name("tablero");
#carreras
Route::view("carreras", "administrador.carreras.index_carrera")->middleware('can:admin.carrera.titulo')->name("carreras.index");
#turnos
Route::view("turnos", "administrador.turnos.index_turno")->middleware('can:admin.turno.titulo')->name("turnos.index");
#ciclos
Route::view("ciclos", "administrador.ciclos.index_ciclo")->middleware('can:admin.ciclo.titulo')->name("ciclos.index");
#modalidads
Route::view("modalidads", "administrador.modalidads.index_modalidad")->middleware('can:admin.modalidad.titulo')->name("modalidads.index");
#pagos
Route::view("pagos", "administrador.pagos.pagos_index")->name("pagos.index");
#settings
Route::view("settings", "administrador.index")->name("settings.index");

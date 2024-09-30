<?php

use Illuminate\Support\Facades\Route;

#dashboard principal
Route::view("/", "administrador.index")->name("tablero");
#aulas
Route::view("aulas", "administrador.aulas.index_aula")->middleware('can:admin.aula.titulo')->name("aulas.index");
#carreras
Route::view("carreras", "administrador.carreras.index_carrera")->middleware('can:admin.carrera.titulo')->name("carreras.index");
#ciclos
Route::view("ciclos", "administrador.ciclos.index_ciclo")->middleware('can:admin.ciclo.titulo')->name("ciclos.index");
#grupos
Route::view("grupos", "administrador.grupos.index_grupo")->middleware('can:admin.grupo.titulo')->name("grupos.index");
#cgrupos
Route::view("cgrupos", "administrador.cgrupos.index_cgrupo")->middleware('can:admin.cgrupo.titulo')->name("cgrupos.index");
#modalidads
Route::view("modalidads", "administrador.modalidads.index_modalidad")->middleware('can:admin.modalidad.titulo')->name("modalidads.index");
#pagos
Route::view("pagos", "administrador.pagos.pagos_index")->name("pagos.index");
#turnos
Route::view("turnos", "administrador.turnos.index_turno")->middleware('can:admin.turno.titulo')->name("turnos.index");
#settings
Route::view("settings", "administrador.index")->name("settings.index");

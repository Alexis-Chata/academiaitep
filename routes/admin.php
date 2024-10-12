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
#cstandar
Route::view("cstandars", "administrador.cstandars.index_cstandar")->middleware('can:admin.cstandar.titulo')->name("cstandars.index");
#modalidads
Route::view("modalidads", "administrador.modalidads.index_modalidad")->middleware('can:admin.modalidad.titulo')->name("modalidads.index");
#pagos
Route::view("pagos", "administrador.pagos.pagos_index")->name("pagos.index");
#turnos
Route::view("turnos", "administrador.turnos.index_turno")->middleware('can:admin.turno.titulo')->name("turnos.index");
#settings
Route::view("settings", "administrador.index")->name("settings.index");
#usuarios
Route::view("usuarios", "administrador.usuarios.index")->middleware('can:admin.usuarios.titulo')->name("usuarios.index");


// Nuevas rutas para el frontend
#tipo comprobantes
Route::view("tipo-comprobantes", "administrador.tipo_comprobantes.tipo_comprobantes_index")->name("tipo_comprobantes.index");

#tipo afectaciones
Route::view("tipo-afectaciones", "administrador.tipo_afectaciones.tipo_afectaciones_index")->name("tipo_afectaciones.index");

#tipo documentos
Route::view("tipo-documentos", "administrador.tipo_documentos.tipo_documentos_index")->name("tipo_documentos.index");

#empresas
Route::view("empresas", "administrador.empresas.empresas_index")->name("empresas.index");

#sedes - Series
Route::view("sedes-series", "administrador.sedes_series.index")->name("sedes_series.index");

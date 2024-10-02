<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/easy-web', function () {
    Http::get('http://157.230.213.30:3000/api/box/deploy/24afa5260f33107c9002d660ade0bf15fcfdee59b6267b86');

    return response()->json(['message' => 'Solicitud enviada correctamente']);
})->name('apieasyweb');

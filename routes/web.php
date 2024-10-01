<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('admin.tablero'));
    //return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect(route('admin.tablero'));
})->name('dashboard');

Route::get('/home', function () {
    return redirect(route('admin.tablero'));
})->name('home');

Route::post('/easy-web', function () {
    $response = Http::get('http://157.230.213.30:3000/api/box/deploy/24afa5260f33107c9002d660ade0bf15fcfdee59b6267b86');
    return $response->status();
})->name('easyweb');

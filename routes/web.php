<?php

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

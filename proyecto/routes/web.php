<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Opción directa retornando la vista
Route::get('/iniciar-sesion', function () {
    return view('IniciarSesion.iniciarSesion');
})->name('login.view');

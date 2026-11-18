<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

Route::get('/', function () {
    return view('welcome');
});

// Opción directa retornando la vista
Route::get('/iniciar-sesion', function () {
    return view('IniciarSesion.iniciarSesion');
})->name('login.view');

Route::get('/personas', [PersonaController::class, 'mostrar']);

Route::view('/aprendices/crear', 'aprendices.formulario');

Route::post('/aprendices', [PersonaController::class, 'presentar']);

Route::get('/aprendices', [PersonaController::class, 'listar']);

Route::get('/aprendices/{id}/editar', [PersonaController::class, 'editar'])
    ->whereNumber('id');

Route::put('/aprendices/{id}', [PersonaController::class, 'actualizar'])
    ->whereNumber('id');

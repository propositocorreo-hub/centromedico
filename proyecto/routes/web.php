<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;


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


// Mostrar formulario de registro
Route::get('/registro', [RegistroController::class, 'mostrarFormulario'])->name('registro.form');

// Procesar el envío del formulario de registro
Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro.guardar');

// Dashboard (solo accesible si el usuario ha iniciado sesión)
Route::get('/dashboard', function () {
    return view('dashboard', [
        'usuario' => Auth::user(),
    ]);
})->middleware('auth')->name('dashboard');

// Mostrar formulario de inicio de sesión
Route::get('/login', [RegistroController::class, 'mostrarLogin'])->name('login');

// Procesar el inicio de sesión
Route::post('/login', [RegistroController::class, 'login']);

// cerrar sesion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ruta exportar pdf

Route::get('/aprendices/pdf', [PersonaController::class, 'exportarPdf']);

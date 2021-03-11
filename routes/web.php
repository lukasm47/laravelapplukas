<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Manejar vistas de invitados
Route::get('/', [App\Http\Controllers\GuestController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ROUTA ABRIR VISTA CREAR
Route::get('/Entrada/Crear', [App\Http\Controllers\EntryController::class, 'mostrarEntrada']);

//RUTA agregar ENTRADA a la BD
Route::post('/entrada', [App\Http\Controllers\EntryController::class, 'agregarEntrada', '$request']);

//RUTA VER MI ENTRADAS
Route::get('/entrada/N°{myitem}', [App\Http\Controllers\GuestController::class, 'vermyEntrada']);


//RUTA EDITAR MIS ENTRADAS
Route::get('/entrada/N°{myitem}/editar', [App\Http\Controllers\EntryController::class, 'showeditarEntrada']);

//RUTA PARA GUARDAR CAMBIOS ENTRADA
Route::put('/entrada/N{myitem}', [App\Http\Controllers\EntryController::class, 'updateEntrada', '$request']);

//RUT PARA USUARIOS
Route::get('usuarios/{user}', [App\Http\Controllers\UserController::class, 'mostrarUsuario']);

//RUTA BORRAR ENTRADA

Route::delete('/entrada/borrar{myitem}', [App\Http\Controllers\EntryController::class, 'eliminarEntrada']);





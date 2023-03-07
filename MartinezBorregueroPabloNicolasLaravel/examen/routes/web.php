<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::controller(AlumnoController::class)->group(function () {
//     Route::post('modulos/{id}/{alumnos}', 'store')->name('alumnos.store');
//     Route::get('post/{post}/edit', 'edit')->name('editPost');

//     Route::get('/modulos/{id}/alumnos', 'showAlumnos')->name('modulos.alumnos');

    
//     Route::put('post/{post}', 'update')->name('updatePost');
//     Route::delete('post/{post}', 'destroy')->name('destroyPost');
// });

Route::get('/modulos/{modulo}/alumnos', [AlumnoController::class, 'showAlumnos'])->name('modulos.alumnos');
Route::post('/modulos/{id}/alumnos', [AlumnoController::class, 'agregar'])->name('agregar');


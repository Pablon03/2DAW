<?php

use App\Http\Controllers\HomeController;
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


Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'showLoginForm')->name('showLogin');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'showRegistrationForm')->name('showRegistration');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
});


// Route::get('/', HomeController::class);

// Route::controller(CursoController::class)->group(function(){
//     Route::get('cursos', 'index') ->name('cursos.index');
//     Route::get('cursos/create', 'create') ->name('cursos.create');
//     Route::post('cursos', 'store')->name('cursos.store');
//     Route::get('cursos/{curso}', 'show') ->name('cursos.show');
//     Route::get('cursos/{curso}/edit', 'edit')->name('cursos.edit');
//     Route::put('cursos/{curso}', 'update')->name('cursos.update');
// });
<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', [HomeController::class, 'index'])->name('index');

});

Route::controller(PostController::class)->group(function () {
    Route::post('store', 'store')->name('store');
    Route::get('post/{post}/edit', 'edit')->name('editPost');
    Route::put('post/{post}', 'update')->name('updatePost');
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



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//     Route::get('/', function () {
//         return view('index');
//     })->name('inndex');
// });

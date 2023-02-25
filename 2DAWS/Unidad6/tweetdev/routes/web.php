<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
    Route::delete('post/{post}', 'destroy')->name('destroyPost');
});

Route::controller(UserController::class)->group(function () {
    Route::get('user/{id}', 'show')->name('showUser');
});

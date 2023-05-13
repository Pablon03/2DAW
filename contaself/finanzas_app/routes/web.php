<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });




Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

// Route::controller(PostController::class)->group(function () {
//     Route::post('store', 'store')->name('store');
//     Route::get('post/{post}/edit', 'edit')->name('editPost');
//     Route::put('post/{post}', 'update')->name('updatePost');
//     Route::delete('post/{post}', 'destroy')->name('destroyPost');
// });

// Route::controller(UserController::class)->group(function () {
//     Route::get('user/{id}', 'show')->name('showUser');
// });

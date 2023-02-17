<?php

use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'RegisterController@register');

Route::post('/follow/{user_id}', 'FollowController@follow')->name('follow');
Route::post('/unfollow/{user_id}', 'FollowController@unfollow')->name('unfollow');

Route::post('/like/{post_id}', 'LikeController@like')->name('like');
Route::post('/unlike/{post_id}', 'LikeController@unlike')->name('unlike');


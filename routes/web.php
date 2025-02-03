<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*Route::get('/posts/{id}', [PostController::class, "show"])->where('id', '[0-9]+');
Route::get('/posts/{id}/edit', [PostController::class, "edit"]);
Route::get('/posts', [PostController::class, "index"]);
Route::post('/posts', [PostController::class, "store"]);
Route::get('/posts/create', [PostController::class, "create"]);
Route::put('/posts/{id}', [PostController::class, "update"]);
Route::delete('/posts/{id}', [PostController::class, "destroy"]);*/

Route::resource("posts", PostController::class)->middleware("auth");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

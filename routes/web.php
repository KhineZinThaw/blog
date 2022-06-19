<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


// Route::get('/welcome/{lang}', function($lang) {
//     if ($lang == 'en') {
//         return "en";
//     }

//     if ($lang == 'my') {
//         return "my";
//     }
// })->where('lang', 'en|my');

Route::prefix('posts')->middleware('myAuth')->group(function() {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/create', [PostController::class, 'create']);
    Route::post('/', [PostController::class, 'store']);
    Route::get('/{id}/edit', [PostController::class, 'edit']);
    Route::put('/{id}', [PostController::class, 'update']);
    Route::get('/{id}', [PostController::class, 'show']);
    Route::delete('/{id}', [PostController::class, 'destroy']);
});

// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/create', [PostController::class, 'create'])->middleware('myAuth');
// Route::post('/posts', [PostController::class, 'store']);
// Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
// Route::put('/posts/{id}', [PostController::class, 'update']);
// Route::get('/posts/{id}', [PostController::class, 'show']);
// Route::delete('/posts/{id}', [PostController::class, 'destroy']);

//post, category
// Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);

// register
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

//login
Route::get('login', [LoginController::class, 'create']);
Route::post('login', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'destroy']);
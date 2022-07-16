<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

//posts
Route::prefix('posts')->middleware('myAuth')->group(function() {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/create', [PostController::class, 'create']);
    Route::post('/', [PostController::class, 'store']);
    Route::get('/{id}/edit', [PostController::class, 'edit']);
    Route::put('/{id}', [PostController::class, 'update']);
    Route::get('/{id}', [PostController::class, 'show']);
    Route::delete('/{id}', [PostController::class, 'destroy']);
});

// categories 
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//post, category resource route
// Route::resource('posts', PostController::class);
// Route::resource('categories', CategoryController::class);

// register
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

//login
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/my-posts', [MyPostController::class, 'index'])->name('my-posts');

//profile upload
Route::get('/profile', [ProfileController::class, 'create'])->name('profile');
Route::post('/profile-upload', [ProfileController::class, 'update'])->name('profile.upload');;
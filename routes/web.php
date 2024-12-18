<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//Project routes
//index
Route::get('/posts', [PostController::class, 'index'])->middleware(['auth'])->name('posts.index');


//create
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');


//store
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


//show
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


//edit


//update


//destory






require __DIR__.'/auth.php';



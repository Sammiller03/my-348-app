<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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
Route::get('/posts/create', [PostController::class, 'create'])->middleware(['auth'])->name('posts.create');


//store
Route::post('/posts', [PostController::class, 'store'])->middleware(['auth'])->name('posts.store');


//show
Route::get('/users/{user}', [UserController::class, 'show'])->middleware(['auth'])->name('users.show');


//edit
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware(['auth'])->name('posts.edit');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->middleware(['auth'])->name('comments.edit');


//update
Route::put('/post/{post}', [PostController::class, 'update'])->middleware(['auth'])->name('posts.update');
Route::put('/comment/{comment}', [CommentController::class, 'update'])->middleware(['auth'])->name('comments.update');


//destory
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware(['auth'])->name('posts.destroy');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware(['auth'])->name('comments.destroy');





require __DIR__.'/auth.php';



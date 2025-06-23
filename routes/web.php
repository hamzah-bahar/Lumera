<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/posts', [PostController::class, 'index'])
        ->name('dashboard.posts.index');
    Route::get('/dashbaord/posts/create', [PostController::class, 'create'])
        ->name('dashboard.posts.create');

    Route::get('/dashboard/categories', [CategoryController::class, 'index'])
        ->name('dashboard.categories.index');

    Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])
        ->name('dashboard.categories.create');

    Route::get('/dashboard/users', [RegisteredUserController::class, 'index'])
        ->name('dashboard.users');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

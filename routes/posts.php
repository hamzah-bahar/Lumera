<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/posts', [PostController::class, 'index'])
    ->name('dashboard.posts.index');

Route::get('/dashbaord/posts/create', [PostController::class, 'create'])
    ->name('dashboard.posts.create');

Route::get('/dashboard/posts/show/{post:slug}', [PostController::class, 'show'])
    ->name('dashboard.posts.show');

Route::get('dashboard/posts/edit/{post:slug}', [PostController::class, 'edit'])
    ->name('dashboard.posts.edit');

Route::post('/dashboard/posts/create', [PostController::class, 'store'])
    ->name('dashboard.posts.store');

Route::put('/dashboard/posts/update/{post:slug}', [PostController::class, 'update'])
    ->name('dashboard.posts.update');

Route::delete('/dashboard/posts/delete/{post}', [PostController::class, 'destroy'])
    ->name('dashboard.posts.destroy');

<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClapController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\front\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $popularArticles = Post::where('category_id', 1)
        ->latest()->limit(3)->get();
    return view('front.index', ['pArticles' => $popularArticles]);
})->name('home');


Route::get('/articles', [ArticleController::class, 'index'])->name('articles');

Route::get('/articles/{post:slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/users/@{user:username}', function (User $user) {
    $user->load('posts');
    return view('front.author', ['user' => $user]);
})->name('author.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // POSTS
    require __DIR__ . '/posts.php';

    // CATEGORIES
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard/categories', [CategoryController::class, 'index'])
            ->name('dashboard.categories.index');

        Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])
            ->name('dashboard.categories.create');

        Route::post('/dashboard/categories/create', [CategoryController::class, 'store'])
            ->name('dashboard.categories.store');

        Route::put('/dashboard/categories/update/{category}', [CategoryController::class, 'update'])
            ->name('dashboard.categories.update');

        Route::delete('dashboard/category/destroy/{category}', [CategoryController::class, 'destroy'])
            ->name('dashboard.category.destroy');
    });


    // USERS
    Route::get('/dashboard/users', [RegisteredUserController::class, 'index'])
        ->name('dashboard.users');

    // FollowUnfollow 
    Route::post('/follow/{user}', [FollowerController::class, 'followUnfollow'])
        ->name('follow');

    // ClapUnclap 
    Route::post('/clap/{post}', [ClapController::class, 'clapUnclap'])
        ->name('clap');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Partners\PartnersController;
use App\Http\Controllers\Prizes\PrizesController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Shared\ContentController;
use App\Http\Controllers\Shared\PagesController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Work\VoteForWorkController;
use App\Http\Controllers\Work\WorkController;
use Illuminate\Support\Facades\Route;

// Main pages
//----------------------------------

Route::get('about_the_contest', [PagesController::class, 'about_the_contest'])->name('about_the_contest');

Route::get('/', [PagesController::class, 'main'])->name('main');

Route::get('feedback', [PagesController::class, 'feedback'])->name('feedback');

Route::get('how_to_become_a_member', [PagesController::class, 'how_to_become_a_member'])
    ->name('how_to_become_a_member');

require __DIR__.'/auth.php';

// Auth
//----------------------------------

Route::group(['middleware' => ['auth:sanctum']], function () {

    // Profile
    //----------------------------------

    Route::get('/profile', [ProfileController::class, 'card'])->name('profile.card');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Works
    //----------------------------------

    Route::resource('works', WorkController::class)->except('index', 'show');

    // Admin
    //----------------------------------

    Route::group(['middleware' => ['role:admin']], function () {

        Route::resource('partners', PartnersController::class)->except('index');

        Route::resource('prizes', PrizesController::class)->except('index');

        Route::resource('news', NewsController::class)->except('index');

        Route::post('contents/{content}/update', [ContentController::class, 'update'])->name('contents.update');

        Route::get('contents/{content}/edit', [ContentController::class, 'edit'])->name('contents.edit');

        Route::post('products/{product}/update', [ProductController::class, 'update'])->name('products.update');

        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    });
});

// Gallery
//----------------------------------

Route::post('works/{work}/vote', VoteForWorkController::class)->name('vote');

Route::resource('works', WorkController::class)->only('show');

Route::get('gallery', [WorkController::class, 'index'])->name('gallery');

// Participants
//----------------------------------

Route::resource('participants', UserController::class)->only('index', 'show');

Route::get('participants_rating', [UserController::class, 'rating'])->name('participants_rating');

// Prizes
//----------------------------------

Route::resource('prizes', PrizesController::class)->only('index');

// Partners
//----------------------------------

Route::resource('partners', PartnersController::class)->only('index');

// News
//----------------------------------

Route::resource('news', NewsController::class)->only('index', 'show');

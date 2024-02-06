<?php

use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Partners\PartnersController;
use App\Http\Controllers\Prizes\PrizesController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Products\RobokassaPaymentController;
use App\Http\Controllers\Shared\ContentController;
use App\Http\Controllers\Shared\PagesController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserAvatarController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Work\WorkController;
use App\Http\Controllers\Work\WorkSearchController;
use Illuminate\Support\Facades\Route;

// Main pages
//----------------------------------

Route::get('about_the_contest', [PagesController::class, 'about_the_contest'])->name('about_the_contest');

Route::get('/', [PagesController::class, 'main'])->name('main');

Route::get('feedback', [PagesController::class, 'feedback'])->name('feedback');

Route::get('how_to_become_a_member', [PagesController::class, 'how_to_become_a_member'])
    ->name('how_to_become_a_member');

Route::post('orders/payment', [RobokassaPaymentController::class, 'result']);

require __DIR__.'/auth.php';

// Auth
//----------------------------------

Route::group(['middleware' => ['auth:sanctum']], function () {

    // Profile
    //----------------------------------

    Route::get('profile', [ProfileController::class, 'card'])->name('profile.card');

    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('profile/edit', [ProfileController::class, 'update'])->name('profile.update');

    Route::patch('profile/security/edit', [ProfileController::class, 'security'])->name('profile.security');

    Route::delete('profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('profile/works', [ProfileController::class, 'works'])->name('profile.works');

    Route::get('profile/payments', [ProfileController::class, 'payments'])->name('profile.payments');

    Route::post('avatar', [UserAvatarController::class, 'update'])->name('avatar.update');

    Route::get('profile/avatar', [UserAvatarController::class, 'edit'])->name('avatar.edit');

    // Works
    //----------------------------------

    Route::resource('works', WorkController::class)->except('index', 'show');

    // Admin
    //----------------------------------

    Route::group(['middleware' => ['role:admin']], function () {

        Route::resource('partners', PartnersController::class)->except('index');

        Route::resource('prizes', PrizesController::class)->except('index');

        Route::resource('news', NewsController::class)->except('index');

        Route::resource('contents', ContentController::class)->only('edit', 'update');

        Route::resource('products', ProductController::class)->only('edit', 'update');

    });
});

// Gallery
//----------------------------------

Route::resource('works', WorkController::class)->only('show');

Route::get('works/search', WorkSearchController::class)->name('search');

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

<?php

use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Partners\PartnersController;
use App\Http\Controllers\Prizes\PrizesController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Products\RobokassaPaymentController;
use App\Http\Controllers\Shared\ContactFormController;
use App\Http\Controllers\Shared\ContentController;
use App\Http\Controllers\Shared\PagesController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserAvatarController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Work\WorkController;
use App\Http\Controllers\Work\WorkSearchController;
use App\Http\Controllers\Work\WorkVoteController;
use Illuminate\Support\Facades\Route;

// Main pages
//----------------------------------

Route::get('about_the_contest', [PagesController::class, 'aboutTheContest'])->name('about_the_contest');

Route::get('/', [PagesController::class, 'main'])->name('main');

Route::resource('contact-form', ContactFormController::class)
    ->only('create', 'store');

Route::get('how_to_become_a_member', [PagesController::class, 'howToBecomeMember'])
    ->name('how_to_become_a_member');

// Robokassa payment
//----------------------------------

Route::post('orders/payment', [RobokassaPaymentController::class, 'result']);

Route::get('orders/success', [RobokassaPaymentController::class, 'success']);

// Auth
//----------------------------------

require __DIR__.'/auth.php';

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

        Route::get('works/{work}/vote', [WorkVoteController::class, 'create'])->name('works.vote.create');

        Route::post('works/{work}/vote', [WorkVoteController::class, 'store'])->name('works.vote.store');

        Route::get('prizes/{prize}/delete', [PrizesController::class, 'delete'])->name('prizes.delete');

        Route::get('news/{news}/delete', [NewsController::class, 'delete'])->name('news.delete');

        Route::get('partners/{partner}/delete', [PartnersController::class, 'delete'])->name('partners.delete');

        Route::resource('news', NewsController::class)->except('index');

        Route::resource('contents', ContentController::class)->only('edit', 'update');

        Route::resource('products', ProductController::class)->only('edit', 'update');

    });
});

// Gallery
//----------------------------------

Route::get('works/search', WorkSearchController::class)->name('search');

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

<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Models\Pages;
use App\Modules\News\Controllers\NewsController;
use App\Modules\User\Controllers\UserController;
use App\Modules\Work\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/about_the_contest', [Pages::class, 'about_the_contest'])->name('about_the_contest');

Route::get('/how_to_become_a_member', function () {
    return view('how_to_become_a_member');
})->name('how_to_become_a_member');

Route::get('/prizes_for_winners', function () {
    return view('prizes_for_winners');
})->name('prizes_for_winners');

Route::get('/partners', function () {
    return view('partners');
})->name('partners');

Route::get('/news', [NewsController::class, 'list'])->name('news');
Route::get('/news/{url}', [NewsController::class, 'card'])->name('news.card');

Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback');


Route::get('/gallery', [WorkController::class, 'list'])->name('gallery');
Route::get('/gallery/{slug}', [WorkController::class, 'card'])->name('gallery.card');
Route::get('/vote/{id}', [WorkController::class, 'vote'])->name('vote');
//Route::get('/gallery', function () {
//    return view('gallery');
//})->name('gallery');

Route::get('/participants', [UserController::class, 'list'])->name('participants');

Route::get('/participants_rating', [WorkController::class, 'rating'])->name('participants_rating');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'card'])->name('profile.card');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('add-work', [WorkController::class, 'create'])
        ->name('work.create');
    Route::post('add-work', [WorkController::class, 'store'])
        ->name('work.store');
});

require __DIR__ . '/auth.php';

Route::get('/delete/image',  [Controller::class, 'deleteImage']);
Route::post('/crop/image', [Controller::class, 'cropImage']);
Route::any('/render/image',  [Controller::class, 'renderFile']);

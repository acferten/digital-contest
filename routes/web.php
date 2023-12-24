<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/how_to_become_a_member', function () {
    return view('how_to_become_a_member');
})->name('how_to_become_a_member');

Route::get('/prizes_for_winners', function () {
    return view('prizes_for_winners');
})->name('prizes_for_winners');

Route::get('/partners', function () {
    return view('partners');
})->name('partners');


Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\SettingsController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/filter', [HomeController::class, 'filter'])->name('filter');
    Route::post('/search', [HomeController::class, 'search'])->name('search');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::post('/wishlist/respond', [WishlistController::class, 'respond'])->name('wishlist.respond');

    Route::get('/avatars', [AvatarController::class, 'index'])->name('avatars');
    Route::post('/avatars/buy', [AvatarController::class, 'buy'])->name('avatars.buy');
    Route::post('/avatars/send', [AvatarController::class, 'send'])->name('avatars.send');

    Route::get('/topup', [AvatarController::class, 'showTopup'])->name('topup');
    Route::post('/topup', [AvatarController::class, 'topup'])->name('topup.submit');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings/hide', [SettingsController::class, 'hide'])->name('settings.hide');
    Route::post('/settings/show', [SettingsController::class, 'show'])->name('settings.show');
});


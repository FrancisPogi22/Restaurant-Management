<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/', 'LandingPage')->name('home');
    Route::post('/', 'authUser')->name('login');
    Route::view('/sign-in', 'Authentication/SignInPage')->name('sign.in.page');
    Route::view('/sign-up', 'Authentication/SignUpPage')->name('sign.up.page');
    Route::get('/sign-out', 'signOut')->name('sign.out.user');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(MainController::class)->group(callback: function () {
        Route::get('/homepage', 'HomePage')->name('home.page');
    });
});

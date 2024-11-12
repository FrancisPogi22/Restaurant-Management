<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/', 'LandingPage')->name('home');
    Route::post('/', 'authUser')->name('login');
    Route::view('/sign-in', 'Authentication/SignInPage')->name('sign.in.page');
    Route::view('/sign-up', 'Authentication/SignUpPage')->name('sign.up.page');
    Route::get('/sign-out', 'signOut')->name('sign.out.user');

    Route::post('/sign-up-user', 'signUpUser')->name('sign.up.user');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(MainController::class)->group(callback: function () {
        Route::get('/homepage', 'HomePage')->name('home.page');
        Route::get('/products', 'Products')->name('product');
    });

    Route::controller(ProductController::class)->name('product')->group(callback: function () {
        Route::post('/create-product', 'CreateProduct')->name('.create');
        Route::put('/update-product/{id}', 'UpdateProduct')->name('.update');
        Route::delete('/delete-product/{id}', 'DeleteProduct')->name('.delete');
    });
});

<?php


use App\Middleware\Auth\{Administrator, Authenticated, Guest, Maintenance};
use Pecee\SimpleRouter\SimpleRouter as Route;
use App\Controllers\{
    PageController,
    UserController,
    addressController,
    measurementController,
};


/** UNIVERSAL ACCESS */

/** GUESTS */
/* Route::group(['middleware' => Guest::class], function () { */
Route::get('/', [UserController::class, 'index'])->name('home');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/signup', [UserController::class, 'store'])->name('signup');
/* }); */

/** AUTHENTICATED USERS */
Route::group(['middleware' => Authenticated::class], function () {
    Route::get('/signout', [UserController::class, 'signout'])->name('signout');
    Route::group(['prefix' => '/address'], function () {
        Route::get('/', [addressController::class, 'index'])->name('address');
        Route::post('/opret', [addressController::class, 'store'])->name('address-create');
    });

    Route::group(['prefix' => '/{addressId}'], function () {
        Route::get('/measurement', [measurementController::class, 'index'])->name('measurement');
        Route::post('/opret', [measurementController::class, 'store'])->name('measurement-create');
        Route::post('/result', [measurementController::class, 'result'])->name('measurement-result');
    });
});
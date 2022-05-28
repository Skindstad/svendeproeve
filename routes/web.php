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
        Route::delete('/{address}/delete', [addressController::class, 'destroy'])->name('address-delete');
    });
    Route::group(['prefix' => '/settings'], function () {
        Route::get('/', [UserController::class, 'settings'])->name('settings');
        Route::patch('/update', [UserController::class, 'update'])->name('user_update');
    });

    Route::group(['prefix' => '/{addressId}'], function () {
        Route::get('/measurement', [measurementController::class, 'index'])->name('measurement');
        Route::post('/opret', [measurementController::class, 'store'])->name('measurement-create');
        Route::post('/result', [measurementController::class, 'result'])->name('measurement-result');
        Route::delete('/{measurement}/delete', [measurementController::class, 'destroy'])->name('measurement-delete');
    });
});
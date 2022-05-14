<?php

use Pecee\SimpleRouter\SimpleRouter as Route;
use App\Controllers\{
    PageController,
    UserController,
};

Route::get('/', [PageController::class, 'index']);

Route::group(['prefix' => '/users'], function () {
    Route::get('/register', [UserController::class, 'create']);
    Route::post('/register', [UserController::class, 'store']);
});

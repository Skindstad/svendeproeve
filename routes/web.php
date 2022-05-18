<?php

use Pecee\SimpleRouter\SimpleRouter as Route;
use App\Controllers\{
    PageController,
    UserController,
    addressController
};

Route::get('/', [PageController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/signup', [UserController::class, 'index'])->name('signup');
Route::post('/signup', [UserController::class, 'store']);
Route::get('/adresse', [addressController::class, 'index']);
Route::post('/adresse/opret', [addressController::class, 'store']);



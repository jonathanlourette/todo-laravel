<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;


Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'show')->name('login');
    Route::post('login', 'login')->name('login.action');
    Route::get('logout', 'logout')->name('logout');
});

Route::middleware(['auth:web'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });
});

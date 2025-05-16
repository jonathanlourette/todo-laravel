<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\TaskController;
use App\Controllers\UserController;

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'show')->name('login');
    Route::post('login', 'login')->name('login.action');
    Route::get('logout', 'logout')->name('logout');
});

Route::middleware(['auth:web'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });

    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('/', 'index')->name('user.index');
        Route::get('create', 'create')->name('user.create');
        Route::post('store', 'store')->name('user.store');
        Route::get('{userId}', 'show')->name('user.show');
        Route::put('{userId}/update', 'update')->name('user.update');
        Route::delete('{userId}/delete', 'delete')->name('user.delete');
    });

    Route::controller(TaskController::class)->prefix('task')->group(function() {
        Route::get('/', 'index')->name('task.index');
        Route::get('create', 'create')->name('task.create');
        Route::post('store', 'store')->name('task.store');
        Route::get('{taskId}', 'show')->name('task.show');
        Route::put('{taskId}/update', 'update')->name('task.update');
        Route::delete('{taskId}/delete', 'delete')->name('task.delete');
        Route::patch('{taskId}/toggle-status', 'toggleStatus')->name('task.toggle-status');
        Route::post('{taskId}/add-user', 'addUser')->name('task.add-user');
        Route::delete('{taskId}/delete-user/{userId}', 'removeUser')->name('task.remove-user');
    });
});

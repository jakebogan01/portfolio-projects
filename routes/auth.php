<?php

use App\Http\Controllers\Epick\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Epick\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// epick routes
Route::middleware('guest')->group(function () {
    Route::get('/epick/register', [RegisteredUserController::class, 'create'])->name('epick.register');
    Route::post('/epick/register', [RegisteredUserController::class, 'store']);
    Route::get('/epick/login', [AuthenticatedSessionController::class, 'create'])->name('epick.login');
    Route::post('/epick/login', [AuthenticatedSessionController::class, 'store']);
});
Route::middleware('auth')->group(function () {
    Route::post('/epick/logout', [AuthenticatedSessionController::class, 'destroy'])->name('epick.logout');
});

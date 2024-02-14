<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Epick\AppController;
use App\Http\Controllers\Epick\ProductController;

require __DIR__ . '/auth.php';

Route::get('/epick', [AppController::class, 'index']);
Route::get('/epick/products/category/{category:slug}', [ProductController::class, 'index']);
Route::get('/epick/products/{product:slug}', [ProductController::class, 'show']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return Inertia::render('About');
})->middleware(['auth', 'verified'])->name('about');

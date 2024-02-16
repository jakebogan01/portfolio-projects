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

Route::get('/epick', AppController::class);

Route::controller(ProductController::class)->name('products.')->prefix('epick/products')->group(function () {
    Route::get('/category/{category:slug}', 'index')->name('index');
    Route::get('/{product:slug}', 'show')->name('show');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return Inertia::render('About');
})->middleware(['auth', 'verified'])->name('about');

<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Epick\AppController;
use App\Http\Controllers\Epick\ProductController;
use App\Http\Controllers\Epick\CheckoutController;

require __DIR__ . '/auth.php';

Route::get('/epick', AppController::class)->name('epick.home');
Route::get('/epick/checkout', CheckoutController::class)->name('epick.checkout');

Route::controller(ProductController::class)->name('products.')->prefix('epick/products')->group(function () {
    Route::get('/category/{category:slug}', 'index')->name('epick.index');
    Route::get('/{product:slug}', 'show')->name('epick.show');
    Route::post('/cart/add', 'store')->name('epick.store');
    Route::delete('/cart/remove/{product}', 'destroy')->name('epick.destroy');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return Inertia::render('About');
})->middleware(['auth', 'verified'])->name('about');

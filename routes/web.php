<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Epick\HomeController;
use App\Http\Controllers\Epick\ProductController;
use App\Http\Controllers\Epick\CategoryController;
use App\Http\Controllers\Epick\CheckoutController;

require __DIR__ . '/auth.php';

Route::get('/epick', HomeController::class)->name('epick.home');
Route::get('/epick/category', CategoryController::class)->name('epick.category');
Route::get('/epick/checkout', CheckoutController::class)->name('epick.checkout');

Route::controller(ProductController::class)->name('products.')->prefix('epick/products')->group(function () {
    Route::get('/category/{category:slug}', 'index')->name('epick.index');
    Route::get('/{global:slug}', 'show')->name('epick.show');
    Route::post('/cart/add', 'store')->name('epick.store');
    Route::delete('/cart/remove/{global}', 'destroy')->name('epick.destroy');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product_details;

Route::match(['GET', 'POST'], '/auth', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('auth');

Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');

Route::get('/products', [Product_details::class, 'index'])
    ->middleware(['verify.shopify'])
    ->name('products.index');
Route::get('/add-product', [Product_details::class, 'add_product'])
    ->middleware(['verify.shopify'])
    ->name('add-product.index');
Route::get('/get-product', [Product_details::class, 'get_product'])
    ->middleware(['verify.shopify'])
    ->name('get-product.index');

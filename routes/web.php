<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product_details;
use App\Http\Controllers\WebhookController;
use Illuminate\Http\Request;
// Route::match(['GET', 'POST'], '/auth', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('auth');


Route::get('/', [Product_details::class, 'index'])
    ->middleware(['verify.shopify'])
    ->name('home');

// Route::post('/webhook/{type}',[WebhookController::class, 'handle'])
//    ->middleware('auth.webhook')
//    ->name('webhook');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

// Home
Route::get('/', [FrontController::class, 'home']);

// Collection
Route::get('/collection', [FrontController::class, 'collection']);

// Contact (simple page hai to theek hai)

Route::get('/contact', [FrontController::class, 'contact']);
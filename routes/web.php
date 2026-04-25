<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

// Home
Route::get('/', [FrontController::class, 'home']);

// Collection
Route::get('/collection', [FrontController::class, 'collection']);

Route::get('/collection/{type}', [FrontController::class, 'collectionViewMore']);

// Contact (simple page hai to theek hai)

Route::get('/contact', [FrontController::class, 'contact']);

Route::get('/category/{id}', [FrontController::class, 'categoryView']);

Route::get('/section/{type}', [FrontController::class, 'sectionPage']);

Route::get('/product/{id}', [FrontController::class, 'productDetail']);

Route::post('/product/store', [ProductController::class, 'store']);

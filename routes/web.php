<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;

// Home
Route::get('/', [FrontController::class, 'home']);

// Collection
Route::get('/collection', [FrontController::class, 'collection']);
Route::get('/collection/{type}', [FrontController::class, 'collectionViewMore']);

// Contact
Route::get('/contact', [FrontController::class, 'contact']);

// Category (ONLY ONE)
Route::get('/category/{id}', [FrontController::class, 'categoryView'])
    ->name('category.view');

// Section
Route::get('/section/{type}', [FrontController::class, 'sectionPage']);

// Product Detail
Route::get('/product/{id}', [FrontController::class, 'productDetail']);

// Store Product
Route::post('/product/store', [ProductController::class, 'store']);

Route::post('/product-review', [FrontController::class, 'storeProductReview'])->name('product.review');
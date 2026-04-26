<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController; 

// ================= FRONT =================

// Home
Route::get('/', [FrontController::class, 'home']);

// Collection
Route::get('/collection', [FrontController::class, 'collection']);
Route::get('/collection/{type}', [FrontController::class, 'collectionViewMore']);

// Contact
Route::get('/contact', [FrontController::class, 'contact']);

// Category
Route::get('/category/{id}', [FrontController::class, 'categoryView'])
    ->name('category.view');

// Section
Route::get('/section/{type}', [FrontController::class, 'sectionPage']);

// Product Detail
Route::get('/product/{id}', [FrontController::class, 'productDetail']);

// Store Product
Route::post('/product/store', [ProductController::class, 'store']);

// Review
Route::post('/product-review', [FrontController::class, 'storeProductReview'])
    ->name('product.review');


// ================= ADMIN =================

// 🔒 Admin Routes (with middleware)
Route::prefix('admin')->middleware('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // Products
    Route::get('/products', [AdminController::class, 'products']);

    // ✅ FIXED (method name correct)
    Route::get('/products/create', [AdminController::class, 'addProduct']);

    Route::post('/products/store', [AdminController::class, 'storeProduct']);

    // Categories
    Route::get('/categories', [AdminController::class, 'categories']);
    Route::post('/categories/store', [AdminController::class, 'storeCategory']);

    // Reviews
    Route::get('/reviews', [AdminController::class, 'reviews']);

    // Category Products
    Route::get('/category/{id}/products', [AdminController::class, 'categoryProducts']);

});

// 🔐 ADMIN LOGIN
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');
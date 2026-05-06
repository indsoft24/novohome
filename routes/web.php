<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;



// ================= FRONT =================

// Home
Route::get('/', [FrontController::class, 'home']);

// Collection
Route::get('/collection', [FrontController::class, 'collection']);
Route::get('/collection/{type}', [FrontController::class, 'collectionViewMore']);

// Contact
Route::get('/contact', [FrontController::class, 'contact']);

// Category
Route::get('/category/{id}', [FrontController::class, 'categoryView'])->name('category.view');

// Section
Route::get('/section/{type}', [FrontController::class, 'sectionPage']);

// Product Detail
Route::get('/product/{id}', [FrontController::class, 'productDetail']);

// Store Product
Route::post('/product/store', [ProductController::class, 'store']);

// Review
Route::post('/product-review', [FrontController::class, 'storeProductReview'])->name('product.review');

Route::post('/order/store', [FrontController::class, 'store'])->name('order.store');

Route::get('/cart', [CartController::class, 'index']);

Route::post('/cart/add', [FrontController::class, 'addToCart'])->name('cart.add');

Route::get('/cart/remove/{id}', [FrontController::class, 'removeCart']);

Route::get('/checkout', [FrontController::class, 'checkoutPage']);

Route::post('/checkout/place-order', [FrontController::class, 'placeOrder']);

Route::get('/order-success', function () {
    return view('order-success');
});

Route::post('/pay', [FrontController::class, 'pay']);

Route::get('/cart-data', [FrontController::class, 'cartData']);

Route::post('/cart/update', [FrontController::class, 'updateCart']);

Route::post('/payment-success', [FrontController::class, 'paymentSuccess']);


// Blog list page
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');

// Single blog page
Route::get('/blog/{id}', [FrontController::class, 'blogDetail'])->name('blog.detail');


// ================= ADMIN =================

Route::prefix('admin')->middleware('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // Products
    Route::get('/products', [AdminController::class, 'products']);
    Route::get('/products/create', [AdminController::class, 'addProduct']);
    Route::post('/products/store', [AdminController::class, 'storeProduct']);

    // ✅ FIXED (no /admin inside)
    Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/products/update/{id}', [ProductController::class, 'update']);
    Route::get('/products/delete/{id}', [ProductController::class, 'delete']);

    // Categories
    Route::get('/categories', [AdminController::class, 'categories']);
    Route::post('/categories/store', [AdminController::class, 'storeCategory']);
    Route::get('/categories/edit/{id}', [AdminController::class, 'editCategory']);
    Route::post('/categories/update/{id}', [AdminController::class, 'updateCategory']);
    Route::get('/categories/delete/{id}', [AdminController::class, 'deleteCategory']);

    // Reviews
    Route::get('/reviews', [AdminController::class, 'reviews']);

    // Category Products
    Route::get('/category/{id}/products', [AdminController::class, 'categoryProducts']);

    // ✅ NEW PAGES (now will work)
    Route::get('/orders', [AdminController::class, 'index']);

    Route::get('/blog', [AdminController::class, 'blog']);
    Route::get('/blog/create', [AdminController::class, 'createBlog']);

    Route::post('/blog/store', [AdminController::class, 'storeBlog']);

    Route::get('/blog/edit/{id}', [AdminController::class, 'editBlog']);
    Route::post('/blog/update/{id}', [AdminController::class, 'updateBlog']);
    
    Route::get('/blog/delete/{id}', [AdminController::class, 'deleteBlog']);

    Route::get('/users', function () {
        return view('admin.users');
    });

    Route::get('/settings', function () {
        return view('admin.settings');
    });

    Route::get('/cart', [FrontController::class, 'cart']);
    Route::get('/checkout', [FrontController::class, 'checkout']);

    Route::get('/invoice/{id}', [AdminController::class, 'invoice']);
});

// 🔐 ADMIN LOGIN
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');


// 🔓 LOGOUT (IMPORTANT)
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/admin/login');
});
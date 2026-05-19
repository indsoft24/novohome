<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ExploreController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/collection', [FrontController::class, 'collection']);
Route::get('/collection/{type}', [FrontController::class, 'collectionViewMore']);
Route::get('/category/{id}', [FrontController::class, 'categoryView'])->name('category.view');
Route::get('/product/{id}', [FrontController::class, 'productDetail']);
Route::get('/cart-data', [FrontController::class, 'cartData']);

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [FrontController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [FrontController::class, 'updateCart']);
    Route::get('/cart/remove/{id}', [FrontController::class, 'removeCart']);
    Route::get('/checkout', [FrontController::class, 'checkoutPage']);
    Route::post('/checkout/place-order', [FrontController::class, 'placeOrder']);
    Route::post('/pay', [FrontController::class, 'pay']);
    Route::post('/payment-success', [FrontController::class, 'paymentSuccess']);
});

Route::post('/order/store', [FrontController::class, 'store'])->name('order.store');
Route::get('/order-success/{id}', function($id){
    $order = \App\Models\Order::findOrFail($id);
    return view('order-success', compact('order'));
});

Route::post('/product-review', [FrontController::class, 'storeProductReview'])->name('product.review');
Route::get('/contact', [FrontController::class, 'contact']);
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [FrontController::class, 'blogDetail'])->name('blog.detail');
Route::get('/section/{type}', [FrontController::class, 'sectionPage']);
Route::get('/explore/{slug}', [FrontController::class, 'explorePage']);
Route::get('/track-order', [FrontController::class, 'trackOrder']);

Route::get('/brand/{id}', [FrontController::class, 'brandPage']);
/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('/admin/products', [AdminController::class, 'products']);
Route::get('/admin/products/create', [AdminController::class, 'addProduct']);
Route::post('/admin/products/store', [AdminController::class, 'storeProduct']);
Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit']);
Route::post('/admin/products/update/{id}', [ProductController::class, 'update']);
Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete']);

Route::get('/admin/categories', [AdminController::class, 'categories']);
Route::post('/admin/categories/store', [AdminController::class, 'storeCategory']);
Route::get('/admin/categories/edit/{id}', [AdminController::class, 'editCategory']);
Route::post('/admin/categories/update/{id}', [AdminController::class, 'updateCategory']);
Route::get('/admin/categories/delete/{id}', [AdminController::class, 'deleteCategory']);
Route::get('/admin/category/{id}/products', [AdminController::class, 'categoryProducts']);

Route::get('/admin/orders', [AdminController::class, 'index']);
Route::get('/admin/invoice/{id}', [AdminController::class, 'invoice']);

Route::get('/admin/blog', [AdminController::class, 'blog']);
Route::get('/admin/blog/create', [AdminController::class, 'createBlog']);
Route::post('/admin/blog/store', [AdminController::class, 'storeBlog']);
Route::get('/admin/blog/edit/{id}', [AdminController::class, 'editBlog']);
Route::post('/admin/blog/update/{id}', [AdminController::class, 'updateBlog']);
Route::get('/admin/blog/delete/{id}', [AdminController::class, 'deleteBlog']);

Route::get('/admin/reviews', [AdminController::class, 'reviews']);
Route::get('/admin/users', function () { return view('admin.users'); });
Route::get('/admin/settings', function () { return view('admin.settings'); });

Route::get('/admin/cart', [FrontController::class, 'cart']);
Route::get('/admin/checkout', [FrontController::class, 'checkout']);

Route::get('/admin/testimonials/edit/{id}', [AdminController::class, 'editTestimonial']);
Route::post('/admin/testimonials/update/{id}', [AdminController::class, 'updateTestimonial']);
Route::delete('/admin/testimonials/delete/{id}', [AdminController::class, 'deleteTestimonial']);

Route::get('/admin/marquee', [AdminController::class, 'marqueePage']);
Route::post('/admin/marquee/update', [AdminController::class, 'updateMarquee']);

Route::get('admin/orders/edit/{id}', [AdminController::class, 'edit']);
Route::post('admin/orders/update/{id}', [AdminController::class, 'updateOrder']);

Route::prefix('admin')->group(function () {
    Route::get('/explore', [ExploreController::class, 'index']);
    Route::get('/explore/create', [ExploreController::class, 'create']);
    Route::post('/explore/store', [ExploreController::class, 'store']);
    Route::get('/explore/edit/{id}', [ExploreController::class, 'edit']);
    Route::post('/explore/update/{id}', [ExploreController::class, 'update']);
    Route::get('/explore/delete/{id}', [ExploreController::class, 'delete']);
});
/*
|--------------------------------------------------------------------------
| BREEZE AUTH ROUTES
|--------------------------------------------------------------------------
*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| REQUIRED (DO NOT REMOVE)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
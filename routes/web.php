<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlisController;
use App\Http\Controllers\Frontend\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\FrontendController@index');
Route::get('category', 'Frontend\FrontendController@category');
Route::get('category/{slug}', 'Frontend\FrontendController@viewcategory');
Route::get('category/{category_slug}/{prodoct_slug}', 'Frontend\FrontendController@viewproduct');
//--------------------------------------------------------------------------------
// Route::middleware(['auth'])->group(function () {
// Route::post('add-to-cart','CartController@addProduct');
// });
Route::post('add-to-cart', 'Frontend\CartController@addProduct');
Route::post('delete-cart-item', 'Frontend\CartController@deleteProduct');
Route::post('update-cart', 'Frontend\CartController@updateCart');
Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteItem']);
Route::get('load-cart-count', [CartController::class, 'cartCount']);//cart count
Route::get('load-wishlist-count', [WishlistController::class, 'wishlistCount']);//wishlist count
//--------------------------------------------------------------------------------
Route::middleware(['auth'])->group(function () { //must be logged
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    //-------------------------------Orders-------------------------------------------------
    Route::post('place-order', [CheckoutController::class, 'placeOrder']);
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);
    //-------------------------------Wishlist-------------------------------------------------
    Route::get('wishlist', [WishlistController::class, 'index']);
    //-------------------------------Payment-------------------------------------------------
    Route::post('proceed-to-pay', [CheckoutController::class, 'razorpayCheck']);

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');





Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', 'Admin\FronendController@index');
    //-------------------------------categories-------------------------------------------------
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']); // another way old one ...edit is the name of the function
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
    //------------------------------------products--------------------------------------------
    Route::get('products', 'Admin\ProductController@index');
    Route::get('add-product', 'Admin\ProductController@add');
    Route::post('insert-product', 'Admin\ProductController@insert');
    Route::get('edit-product/{id}', [ProductController::class, 'edit']); // another way old one ...edit is the name of the function
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
    //------------------------------------Orders--------------------------------------------
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateOrder']);
    Route::get('order-history', [OrderController::class, 'orderHistory']);
    //------------------------------------Users--------------------------------------------
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewUser']);
});

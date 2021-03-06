<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ShippingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/* ------------------
=====================
// Admin Routes
=====================
 ------------------*/

Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::get('admin/updatepassword', [AdminController::class, 'updatepassword']);
Route::group(['middleware' => 'admin_auth'], function () {
    // AdminController
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('admin/logout', [AdminController::class, 'logout']);

    // CategoryController
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/add-category', [CategoryController::class, 'create']);
    Route::get('admin/category/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/manage-category/add', [CategoryController::class, 'add']);
    Route::post('admin/category/manage-category/update', [CategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('admin/category/status/{type}/{id}', [CategoryController::class, 'status']);

    // CouponController
    Route::get('admin/coupon', [CouponController::class, 'index']);
    Route::get('admin/coupon/add-coupon', [CouponController::class, 'create']);
    Route::get('admin/coupon/edit-coupon/{id}', [CouponController::class, 'edit']);
    Route::post('admin/coupon/manage-coupon/add', [CouponController::class, 'add']);
    Route::post('admin/coupon/manage-coupon/update', [CouponController::class, 'update']);
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);

    // SizeController
    Route::get('admin/product/size', [SizeController::class, 'index']);
    Route::get('admin/product/size/add-size', [SizeController::class, 'create']);
    Route::get('admin/product/size/edit-size/{id}', [SizeController::class, 'edit']);
    Route::post('admin/product/size/manage-size/add', [SizeController::class, 'add']);
    Route::post('admin/product/size/manage-size/update', [SizeController::class, 'update']);
    Route::get('admin/product/size/delete/{id}', [SizeController::class, 'delete']);
    Route::get('admin/product/size/status/{type}/{id}', [SizeController::class, 'status']);

    // ColorController
    Route::get('admin/product/color', [ColorController::class, 'index']);
    Route::get('admin/product/color/add-color', [ColorController::class, 'create']);
    Route::get('admin/product/color/edit-color/{id}', [ColorController::class, 'edit']);
    Route::post('admin/product/color/manage-color/add', [ColorController::class, 'add']);
    Route::post('admin/product/color/manage-color/update', [ColorController::class, 'update']);
    Route::get('admin/product/color/delete/{id}', [ColorController::class, 'delete']);
    Route::get('admin/product/color/status/{type}/{id}', [ColorController::class, 'status']);

    // ProductController
    Route::get('admin/product/product-list', [ProductController::class, 'index']);
    Route::get('admin/product/add-product', [ProductController::class, 'create']);
    Route::get('admin/product/edit-product/{slug}', [ProductController::class, 'edit']);
    Route::post('admin/product/manage-product/add', [ProductController::class, 'add']);
    Route::post('admin/product/manage-product/update', [ProductController::class, 'update']);
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('admin/product/status/{type}/{id}', [ProductController::class, 'status']);
    Route::get('admin/product/edit-product/delete-attr/{id}/{slug}', [ProductController::class, 'deleteAttr']);
    Route::get('admin/product/edit-product/delete-image/{id}/{slug}', [ProductController::class, 'deleteimage']);

    // CustomerController
    Route::get('admin/customer', [CustomerController::class, 'index']);
    Route::get('admin/customer/add-customer', [CustomerController::class, 'create']);
    Route::get('admin/customer/edit-customer/{id}', [CustomerController::class, 'edit']);
    Route::post('admin/customer/manage-customer/add', [CustomerController::class, 'add']);
    Route::post('admin/customer/manage-customer/update', [CustomerController::class, 'update']);
    Route::get('admin/customer/delete/{id}', [CustomerController::class, 'delete']);
    Route::get('admin/customer/status/{type}/{id}', [CustomerController::class, 'status']);
    Route::get('admin/customer/edit-customer/delete-attr/{id}/{slug}', [CustomerController::class, 'deleteAttr']);
    Route::get('admin/customer/edit-customer/delete-image/{id}/{slug}', [CustomerController::class, 'deleteimage']);

    // OrderController
    Route::get('admin/order', [OrderController::class, 'index']);
    Route::get('admin/order/order-details/{id}', [OrderController::class, 'order_details']);
    Route::post('admin/change_order_status', [OrderController::class, 'change_order_status']);

    // ReviewController
    Route::get('admin/review', [ReviewController::class, 'index']);
    Route::get('admin/review/{status}/{id}', [ReviewController::class, 'change_review_status']);
    Route::get('admin/review/delete/delete-review/{id}', [ReviewController::class, 'delete_review']);

    //ShippingController
    Route::get('admin/order/order-details/send-to-shiprocket/{id}', [ShippingController::class, 'shipOrder']);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\front\FrontAuthController;
use App\Http\Controllers\front\DanhGiaController;
use App\Http\Controllers\front\FrontOrderController;
use App\Http\Controllers\front\CartController;
use App\Http\Middleware\FrontMiddleware;

// Front
Route::get('/', [FrontController::class, 'home'])->name('front.home');

//Auth
Route::get('/login', [FrontAuthController::class, 'showLogin'])->name('front.auth.showLogin');
Route::post('/login', [FrontAuthController::class, 'login'])->name('front.auth.login');
Route::get('/register', [FrontAuthController::class, 'showRegister'])->name('front.auth.showRegister');
Route::post('/register', [FrontAuthController::class, 'register'])->name('front.auth.register');
Route::get('/logout', [FrontAuthController::class, 'logout'])->name('front.auth.logout');

// Chi tiết sản phẩm
Route::get('/san-pham/{id}', [DanhGiaController::class, 'show'])->name('sanpham.chitiet');
Route::post('/comment/{MaSanPham}', [DanhGiaController::class, 'store'])->name('comment.store');

// Giỏ hàng
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/increase/{productId}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/cart/decrease/{productId}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');

//Đặt hàng 
Route::middleware([FrontMiddleware::class])->group(function () {
    //quản lý đơn hàng
    Route::get('/order', [FrontOrderController::class, 'showOrder'])->name('front.order.showOrder');
    Route::post('/place-order', [FrontOrderController::class, 'placeOrder'])->name('front.order.place');
    Route::get('/my-orders', [FrontOrderController::class, 'myOrders'])->name('front.myOrders');
    Route::get('/order-detail/{order}', [FrontOrderController::class, 'orderDetail'])->name('front.orderDetail');

});
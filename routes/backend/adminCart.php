<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminCartController;
use App\Http\Controllers\Backend\AdminProfileController;


// for pos using database
Route::post('search/product/filter', [AdminCartController::class, 'filterProduct']);
Route::post('add/carts/product/{product}', [AdminCartController::class, 'AddToCart']);
Route::post('add/carts/product/filter/{category}', [AdminCartController::class, 'filterCategory']);
Route::post('add/carts/brand/filter/{brand}', [AdminCartController::class, 'filterBrand']);
Route::get('get/carts/product', [AdminCartController::class, 'GetCart']);
Route::get('remove/carts/product/{id}', [AdminCartController::class, 'RemoveCart']);
Route::get('increment/carts/product/{id}', [AdminCartController::class, 'IncrementProductCart']);
Route::get('decrement/carts/product/{id}', [AdminCartController::class, 'DecrementProductCart']);
Route::get('clear/carts/product', [AdminCartController::class, 'ClearProductCart']);
Route::post('add/order/product/confirm', [AdminCartController::class, 'OrderConfirm']);
Route::get('add/order/posview', [AdminCartController::class, 'orderrecipt']);
Route::post('add/new/customer', [AdminCartController::class, 'AddCustomer'])->name('add.new.customer');
Route::post('hold/order/product', [AdminCartController::class, 'HoldOrder']);
Route::get('get/hold/order/product', [AdminCartController::class, 'GetHoldOrder']);
Route::get('get/hold/order/product/item/{id}', [AdminCartController::class, 'GetHoldOrderItem']);
Route::get('show/hold/order/product/{id}', [AdminCartController::class, 'ShowHoldOrderItem']);
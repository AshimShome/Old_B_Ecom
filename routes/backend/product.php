<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubSubCategoryController;


// for search backend products
Route::get('admin/product/search/ajax/{adminId}/{value}', [ProductController::class, 'searchProductWithAjax']);
Route::get('admin/product/search/ajax/{userId}/{value}', [ProductController::class, 'searchProductWithAjax']);

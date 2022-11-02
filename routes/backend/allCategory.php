<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandCategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BannerCatagoryController;




  //.................... Brand New crud with Jquery ....................//
  Route::prefix('brandcategory')->name('brandcategory.')->group(function () {
    Route::get('/add', [BrandCategoryController::class, 'AddBrandCategory'])->name('brandcategoryadd');
    Route::post('/store', [BrandCategoryController::class, 'AddBrandCategoryStore'])->name('store');
    Route::get('/view', [BrandCategoryController::class, 'AddBrandCategoryView'])->name('view');
    Route::get('/edit/{id}', [BrandCategoryController::class, 'AddBrandCategoryEdit'])->name('edit');
    Route::post('/update/{id}', [BrandCategoryController::class, 'AddBrandCategoryUpdate'])->name('update');
    Route::get('/delete/{id}', [BrandCategoryController::class, 'AddBrandCategoryDelete'])->name('delete');
});


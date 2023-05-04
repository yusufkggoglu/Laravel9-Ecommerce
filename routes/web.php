<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminImageController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSizeController;
use App\Http\Controllers\Admin\AdminStockController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin_')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('adminhome');

    //****************ADMİN CATEGORY ROUTES*****************************
    Route::prefix('category')->name('category_')->controller(AdminCategoryController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::get('/show/{id}', 'show')->name('show');
    });
    //****************ADMİN PRODUCT ROUTES*****************************
    Route::prefix('product')->name('product_')->controller(AdminProductController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::get('/show/{id}', 'show')->name('show');
    });
     //****************ADMİN SIZE ROUTES*****************************
     Route::prefix('size')->name('size_')->controller(AdminSizeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::get('/show/{id}', 'show')->name('show');
    });
     //****************ADMİN STOCK ROUTES*****************************
     Route::prefix('stock')->name('stock_')->controller(AdminStockController::class)->group(function () {
        Route::get('/{id}', 'index')->name('home');
        Route::get('/create/{id}', 'create')->name('create');
        Route::post('/store/{id}', 'store')->name('store');
        Route::get('/edit/{pid}/{id}', 'edit')->name('edit');
        Route::post('/update/{pid}/{id}', 'update')->name('update');
        Route::get('/delete/{pid}/{id}', 'destroy')->name('delete');
    });
     //****************ADMİN STOCK ROUTES*****************************
     Route::prefix('image')->name('image_')->controller(AdminImageController::class)->group(function () {
        Route::get('/{pid}', 'index')->name('home');
        Route::post('/store/{pid}', 'store')->name('store');
        Route::get('/delete/{pid}/{id}', 'destroy')->name('delete');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

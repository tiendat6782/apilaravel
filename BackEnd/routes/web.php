<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Category
    Route::prefix('category')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('admin.category.index'); //list màu
        Route::post('/store', 'store')->name('admin.category.store'); //thêm màu

        Route::get('/destroy/{id}', 'destroy')->name('admin.category.destroy'); //xoá màu
    });
    //product
    Route::prefix('product')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('admin.product.index');
    });


    Route::prefix('size')->controller(SizeController::class)->group(function () {
        Route::get('/', 'index')->name('admin.size.index');
        Route::post('/store', 'store')->name('admin.size.store'); //thêm size

        Route::get('/destroy/{id}', 'destroy')->name('admin.size.destroy'); //xoá size
    });


    Route::prefix('color')->controller(ColorController::class)->group(function () {
        Route::get('/', 'index')->name('admin.color.index'); //list màu
        Route::post('/store', 'store')->name('admin.color.store'); //thêm màu

        Route::get('/destroy/{id}', 'destroy')->name('admin.color.destroy'); //xoá màu
    });
});

<?php


use App\Livewire\Admin\Category\ListCategory;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/category', ListCategory::class)->name('category');
});

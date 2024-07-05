<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChekoutController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\SubCategoryController;




Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/product-category', [WebsiteController::class, 'category'])->name('product-category');
Route::get('/product-detail', [WebsiteController::class, 'product'])->name('product-detail');

//Cart....
Route::get('/show-cart', [CartController::class, 'index'])->name('show-cart');

//Checkout....
Route::get('/checkout', [ChekoutController::class, 'index'])->name('checkout');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/category/manage', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

    Route::get('/sub-category/manage', [SubCategoryController::class, 'index'])->name('sub-category.index');
    Route::get('/sub-category/create', [SubCategoryController::class, 'create'])->name('sub-category.create');
});

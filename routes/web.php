<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyEcommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

//MyEcommerceController
Route::get('/', [MyEcommerceController::class, "index"])->name('home');
Route::get('/product/category', [MyEcommerceController::class, 'category'])->name('product.category');
Route::get("/product/detail", [MyEcommerceController::class, "detail"])->name("product.detail");

//CartController
Route::get('/cart/show', [CartController::class, 'index'])->name('cart.show');

//CheckoutController
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    //DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //CategoryController
    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/category/new', [CategoryController::class, 'store'])->name('category.new');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category/edit/', [CategoryController::class . 'edit'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/status/', [CategoryController::class, 'status'])->name('category.status');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');
});
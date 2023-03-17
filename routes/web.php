<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\MenuController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\MainClientController;
use App\Http\Controllers\Client\ProductFeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CustomerController;
use App\Http\Controllers\Client\CheckoutController;
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
// Register and Login
Route::get('admin/user/login',[LoginController::class,'index'])->name('login');
Route::post('admin/user/login/store',[LoginController::class,'store'])->name('login.store');
Route::get('admin/user/register',[RegisterController::class,'index']);
Route::post('admin/user/register/store',[RegisterController::class,'store'])->name('register.store');

// Logout
Route::get('admin/user/logout',[LoginController::class,'logout'])->name('logout');

// Admin
Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('main',[MainController::class,'index'])->name('admin.main');
        Route::get('/',[MainController::class,'index']);  

            // Menu
        Route::prefix('menu')->group(function(){
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index'])->name('menu.list');
            Route::get('delete/{id}',[MenuController::class,'destroy'])->name('menu.delete');
            Route::get('edit/{id}',[MenuController::class,'edit'])->name('menu.edit');
            Route::post('edit/store/{id}',[MenuController::class,'editStore']);
        });
            // Product
        Route::prefix('product')->group(function(){
            Route::get('list',[ProductController::class,'index'])->name('product.list'); 
            Route::get('add',[ProductController::class,'add'])->name('product.add');
            Route::post('add/store',[ProductController::class,'store'])->name('product.store');
            Route::get('edit/{id}',[ProductController::class,'edit'])->name('product.edit');
            Route::post('edit/store/{id}',[ProductController::class,'editStore']);
            Route::get('delete/{id}',[ProductController::class,'destroy'])->name('product.delete');
        });
            // Slider
            Route::prefix('slider')->group(function(){
                Route::get('list',[SliderController::class,'index'])->name('slider.list'); 
                Route::get('add',[SliderController::class,'add'])->name('slider.add');
                Route::post('add/store',[SliderController::class,'store'])->name('slider.store');
                Route::get('edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
                Route::post('edit/store/{id}',[SliderController::class,'editStore']);
                Route::get('delete/{id}',[SliderController::class,'destroy'])->name('slider.delete');
            });
            // Order
            Route::prefix('order')->group(function(){
                Route::get('list',[OrderController::class,'index'])->name('order.list');
                Route::get('edit/{id}',[OrderController::class,'edit'])->name('order.edit');
                Route::post('edit/store/{id}',[OrderController::class,'editStore']);
                
            });

    }); 
  
});
// Client
Route::get('/',[MainClientController::class,'index'])->name('home');
Route::get('category/{id}',[CategoryController::class,'index'])->name('category.product');
Route::get('product/{id}',[ProductFeController::class,'index'])->name('product.detail');
// Cart
Route::post('save/cart',[CartController::class,'save'])->name('cart.save');
Route::get('cart/show',[CartController::class,'showCart'])->name('cart.show');
Route::post('add-cart-ajax',[CartController::class,'addAjax'])->name('cart.add');
Route::get('cart/delete/{rowId}',[CartController::class,'destroy']);
Route::post('cart/update',[CartController::class,'update'])->name('cart.update');
//Customer
Route::get('customer/login',[CustomerController::class,'login'])->name('customer.login');
Route::get('customer/register',[CustomerController::class,'register'])->name('customer.register');
Route::post('customer/add',[CustomerController::class,'add'])->name('customer.add');
Route::post('customer/login',[CustomerController::class,'login_store'])->name('customer.save');
Route::get('customer/logout',[CustomerController::class,'logout'])->name('customer.logout');
//Checkout
Route::get('checkout',[CheckoutController::class,'checkout'])->name('checkout');
Route::post('save/checkout',[CheckoutController::class,'save'])->name('order.save');
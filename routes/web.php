<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use  App\Http\Controllers\CategoryController;



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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('postlogin', [LoginController::class, 'login'])->name('postlogin');
Route::get('register', [LoginController::class, 'getRegister'])->name('getRegister');
Route::post('register', [LoginController::class, 'postRegister'])->name('postRegister');
Route::middleware(['auth'])->group(function () {
    Route::get('loginUser', [HomeController::class, 'index'])->name('loginUser');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');  
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('add', [ProductController::class, 'create'])->name('getadd');
        Route::post('add', [ProductController::class, 'store'])->name('postadd');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('update', [ProductController::class, 'update'])->name('update');
        route::delete('delete{id}',[ProductController::class, 'destroy'])->name('delete');
    });
    
    Route::prefix('brand')->name('brand.')->group(function () {
        Route::get('/',[BrandController::class, 'index'])->name('index');
        Route::get('add',[BrandController::class, 'create'])->name('getadd');
        Route::post('add',[BrandController::class, 'store'])->name('postadd');
        Route::delete('delete/{id}',[BrandController::class, 'destroy'])->name('delete');
        Route::get('edit/{id}',[BrandController::class, 'edit'])->name('edit');
        Route::put('update',[BrandController::class, 'update'])->name('update');
    });
    
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('add', [CategoryController::class, 'create'])->name('getadd');
        Route::post('add', [CategoryController::class, 'store'])->name('postadd');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('update', [CategoryController::class, 'update'])->name('update');
        Route::delete('delete', [CategoryController::class, 'delete'])->name('delete');
    });
    
});

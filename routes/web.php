<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;


Route::get('/dangnhap',function(){
    return view('Admin.Home');
});
Route::get('/registration',[LoginController::class,'registration']);
Route::post('/store/registration',[LoginController::class,'registration_post'])->name('post');
Route::get('/login',[LoginController::class,'login']);
Route::post('/store',[LoginController::class,'store']);
Route::get('/Main', [MainController::class,'index'])->name('logins');
    Route::prefix('admin')->group(function () {
    
       
        Route::get('/Main', [MainController::class,'index']);
       
        Route::prefix('categories')->group(function () {
           
            Route::get('/list', [CategoryController::class,'list'])->name('category.list');
            Route::get('/create', [CategoryController::class,'create']);
            Route::post('/store', [CategoryController::class,'store'])->name('category.store');
            Route::get('/edit/{id}',  [CategoryController::class,'edit'] )->name('category.edit');
            Route::post('/update/{id}', [ CategoryController::class,'update' ])->name('category.update');
            Route::get('/delete/{id}', [CategoryController::class,'delete' ])->name('category.delete');
        });
        Route::prefix('menu')->group(function () {
            Route::get('/list', [MenuController::class,'list'])->name('menu.list');
            Route::get('/create', [MenuController::class,'create']);
            Route::post('/store',[MenuController::class,'store'])->name('menu.store');
            Route::get('/edit/{id}',  [MenuController::class,'edit'] )->name('menu.edit');
            Route::post('/update/{id}', [ MenuController::class,'update' ])->name('menu.update');
            Route::get('/delete/{id}', [MenuController::class,'delete' ])->name('menu.delete');
         });
         Route::prefix('product')->group(function () {
            Route::get('/list', [ProductController::class,'list'])->name('product.list');
            Route::get('/create', [ProductController::class,'create']);
            Route::post('/store',[ProductController::class,'store'])->name('product.store');
            Route::get('/edit/{id}',  [ProductController::class,'edit'] )->name('product.edit');
            Route::post('/update/{id}', [ ProductController::class,'update' ])->name('product.update');
            Route::get('/delete/{id}', [ProductController::class,'delete' ])->name('product.delete');
    
         });
    
         Route::prefix('user')->group(function () {
            Route::get('/list', [UserController::class,'list'])->name('user.list');
            Route::get('/create', [UserController::class,'create']);
            Route::post('/store',[UserController::class,'store'])->name('user.store');
            Route::get('/edit/{id}',  [UserController::class,'edit'] )->name('user.edit');
            Route::post('/update/{id}', [ UserController::class,'update' ])->name('user.update');
            Route::get('/delete/{id}', [UserController::class,'delete' ])->name('user.delete');
         });
    });



    

 



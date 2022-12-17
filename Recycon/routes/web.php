<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class , 're']);
Route::get('/home', [HomeController::class , 'index'])->name('home');
Route::get('/login', [LoginController::class , 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class , 'store']);

Route::get('/product', [ProductController::class, 'index'])->name('showproduct');
Route::post('/product/{item_id}', [ProductController::class, 'show_detail'])->name('detail');

Route::get('/editprofile', [HomeController::class , 'editprofile'])->middleware('auth')->name('editprofile');
Route::post('/editprofile', [HomeController::class , 'editprofileLogic']);
Route::get('/changepassword', [HomeController::class , 'changepassword'])->middleware('auth')->name('changepassword');
Route::post('/changepassword', [HomeController::class, 'changepasswordLogic']);

Route::get('/cart', [ProductController::class, 'showcart'])->name('cart'); //tambahin middleware customer ->middleware('customer')
Route::post('/cart', [ProductController::class ,'insert_to_cart']);
Route::get('/cart/update/{item_id}', [ProductController::class , 'update_cart'])->name('updatecart'); //tambahin middleware customer ->middleware('customer')
Route::post('/cart/update/{item_id}', [ProductController::class, 'update_cart_logic']);
Route::post('/cart/deleted', [ProductController::class, 'delete_cart_item'])->name('deletecart'); //tambahin middleware customer ->middleware('customer')
Route::post('/cart/checkout', [ProductController::class, 'checkout'])->name('checkout'); //tambahin middleware customer ->middleware('customer')
Route::get('/history', [ProductController::class, 'show_transaction_history'])->name('transactionhistory'); //tambahin middleware customer ->middleware('customer')

Route::get('/viewitem', [AdminController::class , 'adminViewItem'])->name('viewitem')->middleware('admin');
Route::post('/viewitem', [AdminController::class , 'adminDeleteItem']);
Route::get('/updateitem/{product_update_id}', [AdminController::class , 'adminUpdateItem'])->name('updateitem')->middleware('admin');
Route::post('/updateitem/{product_update_id}', [AdminController::class , 'updateItemLogic']);

Route::get('/additem', [AdminController::class, 'adminAddItem'])->name('additem')->middleware('admin');
Route::post('/additem', [AdminController::class, 'addItemLogic']);
Route::post('/search', [HomeController::class, 'search'])->name('search');

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

// Harus diubah.
Route::view('/cart', 'userPages.cart', ['title'=> 'cart'])->name('cart');
Route::view('/history', 'userPages.transactionhistory', ['title'=> 'transactionhistory'])->name('transactionhistory');

Route::get('/viewitem', [AdminController::class , 'adminViewItem'])->name('viewitem'); //tambahin admin middleware ->middleware('admin')
Route::post('/viewitem', [AdminController::class , 'adminDeleteItem']);
Route::get('/updateitem/{product_update_id}', [AdminController::class , 'adminUpdateItem'])->name('updateitem'); // tambahin admin middleware ->middleware('admin')
Route::post('/updateitem/{product_update_id}', [AdminController::class , 'updateItemLogic']);

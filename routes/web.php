<?php

use Illuminate\Support\Facades\Route;use App\Http\Controllers\{ HomeController,  CartController };

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/congiong', function () {
    return view('congiong');
})->name('congiong');

Route::get('/', [HomeController:: class, 'index']);

Route::get('/sanpham/detail/{id}', [HomeController:: class, 'detail'])->name('detail');
Route::get('/congiong', [HomeController:: class, 'congiong']);
Route::get('/search', [HomeController:: class, 'search'])->name('search');
Route::get('/viewAll', [HomeController:: class, 'viewAll'])->name('viewAll');
Route::get('/services', [HomeController:: class, 'services'])->name('services');
  // router cart
  Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::get('add-go-to-cart/{id}', [CartController::class, 'addGoToCart'])->name('add_go_to_cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');


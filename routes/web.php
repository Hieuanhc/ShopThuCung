<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('page.congiong', function () {
    return view('congiong');
})->name('congiong');


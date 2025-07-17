<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProdukController;

Route::get('/', [LoginController::class, 'loginPage'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegisterPage'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/materials', function () {
    return view('materials');
})->name('materials');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::get('/produksi', function () {
    return view('produksi');
})->name('produksi');

Route::get('/qc', function () {
    return view('qc');
})->name('qc');

Route::get('/orders', function () {
    return view('orders');
})->name('orders');

Route::get('/laporan', function () {
    return view('orders');
})->name('orders');

Route::get('/best-seller', function () {
    return view('best-seller');
})->name('best-seller');

Route::get('/latest-collections', function () {
    return view('latest-collections');
})->name('latest-collections');

Route::get('/on-collaboration', function () {
    return view('on-collaboration');
})->name('on-collaboration');

Route::get('/on-sale', function () {
    return view('on-sale');
})->name('on-sale');


Route::get('/laporan', function () {
    return view('laporan');
})->name('laporan');

Route::get('/landing-page', function () {
    return view('landing-page');
})->name('landing-page');

Route::get('/distributor-login', function () {
    return view('distributor-login');
})->name('distributor-login');

Route::get('/distributor-register', function () {
    return view('distributor-register');
})->name('distributor-register');

Route::get('/distributor-dashboard', function () {
    return view('distributor-dashboard');
})->name('distributor-dashboard');

Route::get('/category', function () {
    return view('category');
})->name('category');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/payment', function () {
    return view('payment');
})->name('payment');

Route::get('/confirmation', function () {
    return view('confirmation');
})->name('confirmation');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KebunController;
use App\Http\Controllers\AuthController; 

// ==========================================
// 1. JALUR TAMU (LOGIN & REGISTER)
// ==========================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// 2. AREA MEMBER (WAJIB LOGIN) 🔒
// ==========================================
Route::middleware('auth')->group(function () {
    
    // --> DASHBOARD & MARKET <--
    Route::get('/', [KebunController::class, 'index'])->name('home');
    Route::get('/market', [KebunController::class, 'index'])->name('market');

    // --> FITUR UTAMA <--
    Route::get('/portfolio', [KebunController::class, 'portfolio'])->name('portfolio');
    Route::get('/wallet', [KebunController::class, 'wallet'])->name('wallet');
    Route::get('/account', [KebunController::class, 'akun'])->name('account');
    Route::get('/order', [KebunController::class, 'order'])->name('order');
    Route::get('/berita', [KebunController::class, 'berita'])->name('berita');

    // --> 🔥 INI YANG TADI HILANG (WAJIB ADA) 🔥 <--
    Route::get('/trading', [KebunController::class, 'trading'])->name('trading');
    Route::post('/trading/tebak', [KebunController::class, 'prosesTrading'])->name('trading.proses');
    // --------------------------------------------------

    // --> TRANSAKSI <--
    Route::get('/kebun/detail/{id}', [KebunController::class, 'show'])->name('kebun.detail.custom');
    Route::get('/kebun/beli/{id}', [KebunController::class, 'checkout'])->name('kebun.checkout');
    Route::post('/kebun/bayar/{id}', [KebunController::class, 'prosesBayar'])->name('kebun.bayar');
    Route::get('/transaksi/sukses', function() { return view('kebun.success'); })->name('kebun.sukses');
});

// ==========================================
// 3. GENERATOR DATA
// ==========================================
Route::get('/isi-data-nusantara', function () {
    return "Data Generator."; 
});
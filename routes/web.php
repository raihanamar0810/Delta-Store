<?php

use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('index');
});

// Aplikasi Premium
Route::get('/netflix', function () {
    return view('netflix');
});

Route::get('/spotify', function () {
    return view('spotify');
});

Route::get('/capcut', function () {
    return view('capcut');
});

Route::get('/youtube', function () {
    return view('youtube');
});

Route::get('/tiktok', function () {
    return view('tiktok');
});

Route::get('/alight', function () {
    return view('alight');
});

// Top Up Games
Route::get('/ml', function () {
    return view('ml');
});

Route::get('/ff', function () {
    return view('ff');
});

// Pembayaran
Route::get('/payment', function () {
    return view('payment');  
});

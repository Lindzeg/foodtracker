<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getProductsInfo',])
    ->name('home');

Route::get('/reset', function () {
    session()->flush();
    return redirect()->route('home');
})->name('entries.reset');

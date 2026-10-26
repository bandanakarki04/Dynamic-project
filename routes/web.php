<?php

use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('problems', ProblemController::class)
    ->only(['index', 'create', 'store']);

Route::resource('products', ProductController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
<?php

use App\Http\Controllers\ProblemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\KpiController;

Route::get('/', function () {
    return view('home');
});
Route::resource('tags', TagController::class);

Route::resource('problems', ProblemController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('kpis', KpiController::class);
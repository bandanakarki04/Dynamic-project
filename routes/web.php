<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\KpiController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('tags', TagController::class);

Route::resource('problems', ProblemController::class)
    ->only(['index', 'create', 'store']);
Route::resource('kpis', KpiController::class);

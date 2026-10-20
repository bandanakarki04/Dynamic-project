<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\ProblemController;
Route::resource('problems', ProblemController::class)->only(['index', 'create', 'store']);

<?php

use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SolutionController;
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

Route::resource('products', ProductController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

Route::resource('solutions', SolutionController::class);

require __DIR__.'/auth.php';
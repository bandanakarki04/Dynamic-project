
<?php

use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SolutionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('problems', ProblemController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth');

Route::resource('products', ProductController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

Route::resource('solutions', SolutionController::class);

require __DIR__.'/auth.php';


<?php

use App\Http\Controllers\ProblemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('problems', ProblemController::class)
    ->only(['index', 'create', 'store']);

<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('main');
// });

Route::resource('/', CategoryController::class);

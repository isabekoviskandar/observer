<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [AgentController::class, 'index']);
// Route::resource('/', CategoryController::class);
Route::resource('agents' , AgentController::class);

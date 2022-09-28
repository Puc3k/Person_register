<?php

use App\Http\Controllers\PersonsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PersonsController::class, 'index']);
Route::resource('/persons', PersonsController::class);


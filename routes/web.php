<?php

use App\Http\Controllers\DailiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dailies', DailiesController::class);

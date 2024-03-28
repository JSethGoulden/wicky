<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dailyscape', [ActivityController::class, 'index']);
Route::patch('dailyscape/{activity}', [ActivityController::class, 'update']);

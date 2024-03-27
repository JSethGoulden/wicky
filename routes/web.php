<?php

use App\Http\Controllers\ActivityController;
use App\Models\Activity;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dailyscape', ActivityController::class)->only(['index', 'update']);

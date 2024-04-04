<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('dailyscape')->group(function () {
    Route::get('/todays-travelling-merchant-shop', function() {
        return App\Models\TravellingMerchantShop::select('date', 'slotA', 'slotB', 'slotC')->where('date', Carbon::now()->format('y F Y'))->first();
    });
});

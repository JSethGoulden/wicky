<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/todays-travelling-merchant-shop', function() {
    return App\Models\TravellingMerchantShop::select('date', 'slotA', 'slotB', 'slotC')->where('date', Carbon::now()->format('y F Y'))->first();
});

<?php

use App\Services\NemiForestService;
use App\Services\RuneGoldbergService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/todays-travelling-merchant-shop', function () {
    return App\Models\TravellingMerchantShop::select('date', 'slotA', 'slotB', 'slotC', 'slotAImg', 'slotBImg', 'slotCImg')
        ->where('date', Carbon::now()->format('d F Y'))
        ->first();
});

Route::get('/nemi-forest', function () {
    return Cache::remember('nemi-forest', now()->addHour(), fn () => NemiForestService::getDailyMap());
});

Route::get('/rune-goldberg', function () {
    return Cache::remember('rune-goldberg', now()->addDay(), fn () => RuneGoldbergService::getDailyRunes());
});

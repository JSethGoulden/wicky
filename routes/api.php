<?php

use App\Services\RuneGoldbergService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/todays-travelling-merchant-shop', function () {
    return App\Models\TravellingMerchantShop::select('date', 'slotA', 'slotB', 'slotC', 'slotAImg', 'slotBImg', 'slotCImg')
        ->where('date', Carbon::now()->format('y F Y'))
        ->first();
});

Route::get('/nemi-forest', function () {
    return Cache::remember('nemi-forest', now()->addHour(), function () {
        $response = Http::withoutVerifying()->get('https://www.reddit.com/r/nemiforest/new.json');

        return [
            'thumbnail' => $response->json()['data']['children'][0]['data']['thumbnail'],
            'img' => $response->json()['data']['children'][0]['data']['url_overridden_by_dest'],
        ];
    });
});

Route::get('/rune-goldberg', function () {
    return Cache::remember('rune-goldberg', now()->addDay(), function () {
        return RuneGoldbergService::getDailyRunes();
    });
});

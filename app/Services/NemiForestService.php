<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NemiForestService
{
    public static function getDailyMap()
    {
        try {
            $response = Http::withoutVerifying()->get('https://www.reddit.com/r/nemiforest/new.json');

            if (! $response->successful()) {
                throw new \Exception('Request to reddit api failed -- response uncussessful');
            }

            $data = $response->json();

            if (! isset($data['data']['children'][0])) {
                throw new \Exception('Request to reddit api failed -- json did not parse');
            }

            return [
                'thumbnail' => $response->json()['data']['children'][0]['data']['thumbnail'],
                'img' => $response->json()['data']['children'][0]['data']['url_overridden_by_dest'],
            ];
        } catch (\Exception $e) {
            Log::error($e);

            return ['error' => 'Failed to retrieve nemi forest map'];
        }
    }
}

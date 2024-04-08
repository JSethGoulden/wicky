<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RuneGoldbergService
{
    public static function getDailyRunes()
    {
        try {
            $response = Http::withoutVerifying()
                ->withHeader('User-Agent', 'daily-rune-goldberg')
                ->get('https://runescape.wiki/api.php?format=json&action=parse&prop=text&text=%7B%7BRune%20Goldberg%20Machine/Current%20combinations%7Cmode=bare%7D%7D');

            if (! $response->successful()) {
                throw new \Exception('Request to rs wiki failed -- response unsuccessful');
            }

            $data = $response->json();

            if (! isset($data['parse']['text']['*'])) {
                throw new \Exception('Request to rs wiki failed -- json did not parse');
            }

            preg_match_all('/<img.*?src=\"(.*?)\".*?>/i', $data['parse']['text']['*'], $matches);

            if (count($matches[1]) !== 4) {
                throw new \Exception('Request to rs wiki failed -- wrong number of runes found');
            }

            return array_map(function ($img) {
                return 'https://runescape.wiki'.$img;
            }, $matches[1]);
        } catch (\Exception $e) {
            Log::error($e);

            return ['error' => 'Failed to retrieve daily runes'];
        }
    }
}

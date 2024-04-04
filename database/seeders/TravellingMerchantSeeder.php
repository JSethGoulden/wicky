<?php

namespace Database\Seeders;

use App\Models\TravellingMerchantShop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TravellingMerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(base_path('database/data/travellingmerchant.json')));
        foreach($data as $shop) {
            TravellingMerchantShop::create([
                'date' => $shop->name,
                'slotA' => $shop->slotA,
                'slotB' => $shop->slotB,
                'slotC' => $shop->slotC,
            ]);
        }
    }
}

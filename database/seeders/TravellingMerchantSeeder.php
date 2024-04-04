<?php

namespace Database\Seeders;

use App\Models\TravellingMerchantShop;
use Illuminate\Database\Seeder;

class TravellingMerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = file_get_contents(base_path('database/data/travellingmerchant.json'));
        $data = str_replace("\u{00a0}", '', $data);
        foreach (json_decode($data) as $shop) {
            TravellingMerchantShop::create([
                'date' => $shop->name,
                'slotA' => $shop->slotA,
                'slotB' => $shop->slotB,
                'slotC' => $shop->slotC,
                'slotAImg' => $shop->slotAImg,
                'slotBImg' => $shop->slotBImg,
                'slotCImg' => $shop->slotCImg,
            ]);
        }
    }
}

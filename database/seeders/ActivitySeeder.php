<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dailies = [
            ['name' => 'Travelling Merchant', 'additional_component' => 'TravellingMerchant'],
            ['name' => 'Daily challenges'],
            ['name' => 'Jack of Trades'],
            ['name' => 'Reaper Assignment'],
            ['name' => 'PoF'],
            ['name' => 'Nemi Forest', 'additional_component' => 'NemiForest'],
            ['name' => 'Guthix Caches'],
            ['name' => 'Menaphos Obelisks'],
            ['name' => 'Menaphos Scarabs'],
            ['name' => 'Shop Run'],
            ['name' => 'Red Sandstone'],
            ['name' => 'Rune Goldberg', 'additional_component' => 'RuneGoldberg'],
        ];
        $weeklies = [
            ['name' => 'Thalmund (Wednesday)'],
            ['name' => 'Meg'],
            ['name' => 'Tears of Guthix'],
            ['name' => 'Herby Werby'],
            ['name' => 'Circus'],
            ['name' => 'Penguins'],
            ['name' => 'Water Filtration'],
            ['name' => 'Miscellania'],
            ['name' => 'Fort Forinthry Bonus XP'],
        ];
        $monthlies = [
            ['name' => 'Premier Vault'],
            ['name' => 'Giant Oyster'],
            ['name' => 'God Statues'],
        ];

        $activities = [
            'daily' => $dailies,
            'weekly' => $weeklies,
            'monthly' => $monthlies,
        ];

        foreach ($activities as $type => $activitiesArray) {
            foreach ($activitiesArray as $activity) {
                Activity::create([
                    'type' => $type,
                    'name' => $activity['name'],
                    'additional_component' => $activity['additional_component'] ?? '',
                ]);
            }
        }
    }
}

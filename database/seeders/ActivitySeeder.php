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
            'Check Traveling Merchant',
            'Daily challenges',
            'Jack of Trades',
            'Reaper Assignment',
            'PoF',
            'Nemi Forest',
            'Guthix Caches',
            'Menaphos Obelisks',
            'Menaphos Scarabs',
            'Shop Run',
        ];
        $weeklies = [
            'Thalmund (Wednesday)',
            'Meg',
            'Tears of Guthix',
            'Herby Werby',
            'Circus',
            'Penguins',
            'Water Filtration',
            'Miscellania',
            'Fort Forinthry Bonus XP',
        ];
        $monthlies = ['Premier Vault', 'Giant Oyster', 'God Statues'];

        $activities = [
            'daily' => $dailies,
            'weekly' => $weeklies,
            'monthly' => $monthlies,
        ];

        foreach ($activities as $type => $activitiesArray) {
            foreach ($activitiesArray as $activity) {
                Activity::create([
                    'type' => $type,
                    'name' => $activity,
                ]);
            }
        }
    }
}

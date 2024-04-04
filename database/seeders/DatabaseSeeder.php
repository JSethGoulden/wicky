<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ActivitySeeder::class);
        $this->call(TravellingMerchantSeeder::class);

        User::factory()->create([
            'id' => 1,
            'name' => 'Wicky',
            'email' => 'test@example.com',
        ]);
    }
}

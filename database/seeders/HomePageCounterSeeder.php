<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\HomePageManagement\HomePageCounter;

class HomePageCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePageCounter::factory()
            ->count(5)
            ->create();
    }
}

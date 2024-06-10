<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\HomePageManagement\HomePageQualityServiceRating;

class HomePageQualityServiceRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePageQualityServiceRating::factory()
            ->count(5)
            ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Admin\HomePageManagement\HomePageSlider;
use Illuminate\Database\Seeder;

class HomePageSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePageSlider::factory()
            ->count(5)
            ->create();
    }
}

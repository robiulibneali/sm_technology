<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\ServiceManagement\OurServiceCategory;

class OurServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurServiceCategory::factory()
            ->count(5)
            ->create();
    }
}

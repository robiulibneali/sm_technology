<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\PortfolioManagement\PortfolioCategory;

class PortfolioCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PortfolioCategory::factory()
            ->count(5)
            ->create();
    }
}

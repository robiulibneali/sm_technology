<?php

namespace Database\Seeders;

use App\Models\Admin\PortfolioManagement\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::factory()
            ->count(5)
            ->create();
    }
}

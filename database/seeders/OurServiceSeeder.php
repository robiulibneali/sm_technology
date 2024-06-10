<?php

namespace Database\Seeders;

use App\Models\Admin\ServiceManagement\OurService;
use Illuminate\Database\Seeder;

class OurServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurService::factory()
            ->count(5)
            ->create();
    }
}

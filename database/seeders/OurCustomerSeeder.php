<?php

namespace Database\Seeders;

use App\Models\Admin\AdditionalFeaturesManagement\OurCustomer;
use Illuminate\Database\Seeder;

class OurCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurCustomer::factory()
            ->count(5)
            ->create();
    }
}

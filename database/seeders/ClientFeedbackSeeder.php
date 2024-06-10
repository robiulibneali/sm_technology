<?php

namespace Database\Seeders;

use App\Models\Admin\AdditionalFeaturesManagement\ClientFeedback;
use Illuminate\Database\Seeder;

class ClientFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientFeedback::factory()
            ->count(5)
            ->create();
    }
}

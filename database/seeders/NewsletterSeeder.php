<?php

namespace Database\Seeders;

use App\Models\Admin\AdditionalFeaturesManagement\Newsletter;
use Illuminate\Database\Seeder;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Newsletter::factory()
            ->count(5)
            ->create();
    }
}

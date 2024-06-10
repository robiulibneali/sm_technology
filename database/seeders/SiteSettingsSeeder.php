<?php

namespace Database\Seeders;

use App\Models\Admin\AdditionalFeaturesManagement\SiteSettings;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSettings::factory()
            ->count(5)
            ->create();
    }
}

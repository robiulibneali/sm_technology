<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\AdditionalFeaturesManagement\ExpertTeamMember;

class ExpertTeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExpertTeamMember::factory()
            ->count(5)
            ->create();
    }
}

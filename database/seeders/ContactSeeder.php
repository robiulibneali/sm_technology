<?php

namespace Database\Seeders;

use App\Models\Admin\AdditionalFeaturesManagement\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()
            ->count(5)
            ->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);

        $this->call(BlogSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(BlogCommentSeeder::class);
        $this->call(ClientFeedbackSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(ExpertTeamMemberSeeder::class);
        $this->call(HomePageCounterSeeder::class);
        $this->call(HomePageQualityServiceRatingSeeder::class);
        $this->call(HomePageSliderSeeder::class);
        $this->call(NewsletterSeeder::class);
        $this->call(OurCustomerSeeder::class);
        $this->call(OurServiceSeeder::class);
        $this->call(OurServiceCategorySeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PermissionCategorySeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(PortfolioCategorySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SiteSettingsSeeder::class);
        $this->call(UserSeeder::class);
    }
}

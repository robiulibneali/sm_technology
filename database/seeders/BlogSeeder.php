<?php

namespace Database\Seeders;

use App\Models\Admin\BlogManagement\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::factory()
            ->count(5)
            ->create();
    }
}

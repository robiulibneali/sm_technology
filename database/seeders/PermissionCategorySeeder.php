<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\RoleManagement\PermissionCategory;

class PermissionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        PermissionCategory::factory()
//            ->count(5)
//            ->create();

        PermissionCategory::insert([
            [
                'id' => 1,
                'name'  => 'Dashboard',
                'slug'  => 'Dashboard',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 2,
                'name'  => 'Permission Management',
                'slug'  => 'permission-management',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 3,
                'name'  => 'Role Management',
                'slug'  => 'role-management',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 10,
                'name'  => 'Blog Management',
                'slug'  => 'blog-management',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 13,
                'name'  => 'Notice Management',
                'slug'  => 'notice-management',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 16,
                'name'  => 'User Management',
                'slug'  => 'user-management',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 18,
                'name'  => 'Page Management',
                'slug'  => 'page-management',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 19,
                'name'  => 'Contact Management',
                'slug'  => 'contact-management',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 22,
                'name'  => 'Information Management',
                'slug'  => 'information-management',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
            [
                'id' => 24,
                'name'  => 'Notification Management',
                'slug'  => 'notification-management',
                'note'  => '',
                'status'    => 1,
                'is_default'    => 1,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Admin\RoleManagement\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Role::factory()
//            ->count(5)
//            ->create();

        Role::insert([
            [
                'id'            => 1,
                'title'         => 'Super Admin',
                'note'          => '',
                'slug'          => 'super-admin',
                'is_default'    => 1,
                'status'        =>  1
            ],
            [
                'id'            => 2,
                'title'         => 'Admin',
                'note'          => '',
                'slug'          => 'admin',
                'is_default'    => 1,
                'status'        =>  1
            ],
            [
                'id'            => 3,
                'title'         => 'Moderator',
                'note'          => '',
                'slug'          => 'moderator',
                'is_default'    => 1,
                'status'        =>  1
            ],
            [
                'id'            => 4,
                'title'         => 'Editor',
                'note'          => '',
                'slug'          => 'editor',
                'is_default'    => 1,
                'status'        =>  1
            ],
            [
                'id'            => 5,
                'title'         => 'Stuff',
                'note'          => '',
                'slug'          => 'stuff',
                'is_default'    => 1,
                'status'        =>  1
            ],
        ]);
    }
}

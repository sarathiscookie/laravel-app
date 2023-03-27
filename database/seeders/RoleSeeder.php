<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'status' => 'active',
            ],
            [
                'name' => 'Hotel Owner',
                'status' => 'active',
            ],
            [
                'name' => 'Hotel Manager',
                'status' => 'active',
            ],
            [
                'name' => 'Hotel Accountant',
                'status' => 'disabled',
            ],
            [
                'name' => 'Hotel Receptionist',
                'status' => 'disabled',
            ],
        ];

        foreach ($roles as $role) {
            Role::insert($role);
        }
    }
}

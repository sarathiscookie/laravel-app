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
                'status' => Role::ACTIVE,
            ],
            [
                'name' => 'Hotel Owner',
                'status' => Role::ACTIVE,
            ],
            [
                'name' => 'Hotel Manager',
                'status' => Role::ACTIVE,
            ],
            [
                'name' => 'Hotel Accountant',
                'status' => Role::ACTIVE,
            ],
            [
                'name' => 'Hotel Receptionist',
                'status' => Role::ACTIVE,
            ],
        ];

        foreach ($roles as $role) {
            Role::insert($role);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Enum\StatusEnum;
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
                'status' => StatusEnum::ACTIVE->value,
            ],
            [
                'name' => 'Hotel Owner',
                'status' => StatusEnum::ACTIVE->value,
            ],
            [
                'name' => 'Hotel Manager',
                'status' => StatusEnum::ACTIVE->value,
            ],
            [
                'name' => 'Hotel Accountant',
                'status' => StatusEnum::ACTIVE->value,
            ],
            [
                'name' => 'Hotel Receptionist',
                'status' => StatusEnum::ACTIVE->value,
            ],
        ];

        foreach ($roles as $role) {
            Role::insert($role);
        }
    }
}

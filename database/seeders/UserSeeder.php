<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enum\StatusEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('password', [
                    'rounds' => 12,
                ]),
                'contact_number' => '1111111111',
                'country_id' => 1,
                'state_id' => 1,
                'city_id' => 1,
                'address' => 'Kochi',
                'status' => StatusEnum::ACTIVE->value,
            ],
            [
                'role_id' => 2,
                'name' => 'Taj Owner',
                'email' => 'tajhotel@test.com',
                'password' => Hash::make('password', [
                    'rounds' => 12,
                ]),
                'contact_number' => '2222222222',
                'country_id' => 1,
                'state_id' => 1,
                'city_id' => 1,
                'address' => 'Kochi',
                'status' => StatusEnum::ACTIVE->value,
            ],
            [
                'role_id' => 3,
                'name' => 'Taj Manager',
                'email' => 'tajhotelmanager@test.com',
                'password' => Hash::make('password', [
                    'rounds' => 12,
                ]),
                'contact_number' => '3333333333',
                'country_id' => 1,
                'state_id' => 1,
                'city_id' => 1,
                'address' => 'Kochi',
                'status' => StatusEnum::ACTIVE->value,
            ]
        ];

        foreach ($users as $user) {
            $user_info = new User();
 
            $user_info->role_id = $user['role_id'];
            $user_info->name = $user['name'];
            $user_info->email = $user['email'];
            $user_info->password = $user['password'];
            $user_info->contact_number = $user['contact_number'];
            $user_info->country_id = $user['country_id'];
            $user_info->state_id = $user['state_id'];
            $user_info->city_id = $user['city_id'];
            $user_info->address = $user['address'];
            $user_info->status = $user['status'];
 
            $user_info->save();
        }
    }
}

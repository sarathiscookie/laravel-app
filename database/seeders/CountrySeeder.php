<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'India',
                'code' => 'IN',
                'active' => 'active'
            ],
            [
                'name' => 'United States',
                'code' => 'US',
                'active' => 'active'
            ]
        ];

        foreach ($countries as $country) {
            Country::insert($country);
        }
    }
}

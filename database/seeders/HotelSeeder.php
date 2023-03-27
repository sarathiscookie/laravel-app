<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'user_id' => 2,
                'name' => 'Taj Malabar',
                'total_rooms' => 350,
                'available_rooms' => 350,
                'country_id' => 1,
                'state_id' => 1,
                'city_id' => 1,
                'location' => 'Kochi, Wellingdon Island',
                'status' => 'active'
            ],
            [
                'user_id' => 2,
                'name' => 'Taj Hotel',
                'total_rooms' => 500,
                'available_rooms' => 500,
                'country_id' => 1,
                'state_id' => 1,
                'city_id' => 1,
                'location' => 'Kochi, Marine Drive',
                'status' => 'active'
            ],
            [
                'user_id' => 3,
                'name' => 'Marriot Hotel',
                'total_rooms' => 250,
                'available_rooms' => 250,
                'country_id' => 1,
                'state_id' => 1,
                'city_id' => 1,
                'location' => 'Kochi, Lulu',
                'status' => 'active'
            ],
        ];

        foreach ($hotels as $hotel) {
            $hotel_info = new Hotel;

            $hotel_info->user_id = $hotel['user_id'];
            $hotel_info->name = $hotel['name'];
            $hotel_info->total_rooms = $hotel['total_rooms'];
            $hotel_info->available_rooms = $hotel['available_rooms'];
            $hotel_info->country_id = $hotel['country_id'];
            $hotel_info->state_id = $hotel['state_id'];
            $hotel_info->city_id = $hotel['city_id'];
            $hotel_info->location = $hotel['location'];
            $hotel_info->status = $hotel['status'];

            $hotel_info->save();
        }
    }
}

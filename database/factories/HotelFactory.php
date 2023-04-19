<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => auth()->user()->id,
            "name" => "Taj Gateway",
            "total_rooms" => 300,
            "available_rooms" => 300,
            "country_id" => 1,
            "state_id" => 1,
            "city_id" => 1,
            "location" => fake()->address(),
            "postcode" => fake()->postcode()
        ];
    }
}

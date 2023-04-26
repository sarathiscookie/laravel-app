<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelContact>
 */
class HotelContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id' => function () {
                return Hotel::factory()->create()->id;
            },
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber()
        ];
    }
}

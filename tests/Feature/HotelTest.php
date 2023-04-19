<?php

namespace Tests\Feature;

use App\Models\Hotel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();

        $this->authUser();
    }
    
    public function test_fetch_all_hotels(): void
    {
        $response = $this->getJson(route('hotels.index'));

        $response->assertStatus(200);
    }

    public function test_store_hotel(): void
    {
        $hotel = Hotel::factory()->make();

        $response = $this->postJson(route('hotels.store'), [
            "user_id" => $this->user->id,
            "name" => $hotel->name,
            "total_rooms" => $hotel->total_rooms,
            "available_rooms" => $hotel->available_rooms,
            "country_id" => $hotel->country_id,
            "state_id" => $hotel->state_id,
            "city_id" => $hotel->city_id,
            "location" => $hotel->location,
            "postcode" => $hotel->postcode
        ])
        ->assertCreated();

        $this->assertEquals($hotel->user_id, $response->json()['hotel']['user_id']);

        $this->assertDatabaseHas('hotels', [
            'user_id' => $hotel->user_id
        ]);
    }
}

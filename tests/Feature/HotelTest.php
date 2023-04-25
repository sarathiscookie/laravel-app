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

    private $hotel;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
        
        $this->authUser();

        $this->hotel = $this->createHotel();
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
            'user_id' => $this->user->id,
            'name' => $hotel->name,
            'total_rooms' => $hotel->total_rooms,
            'available_rooms' => $hotel->available_rooms,
            'country_id' => $hotel->country_id,
            'state_id' => $hotel->state_id,
            'city_id' => $hotel->city_id,
            'location' => $hotel->location,
            'postcode' => $hotel->postcode,
            'contacts' => [
                [
                    'hotel_id' => $hotel->id,
                    'email' => 't@tajisland.com',
                    'phone' => [
                        1111111111,
                        2222222222
                    ]
                ],
                [
                    'hotel_id' => $hotel->id,
                    'email' => 's@tajisland.com',
                    'phone' => [
                        3333333333,
                        4444444444
                    ]
                ]
            ]
        ])
        ->assertCreated();

        $this->assertEquals($hotel->user_id, $response->json()['hotel']['user_id']);

        $this->assertDatabaseHas('hotels', [
            'user_id' => $hotel->user_id
        ]);
    }

    public function test_update_hotel(): void
    {
        $this->patchJson(route('hotels.update', $this->hotel->id), [
            'name' => 'Test hotel name update',
            'total_rooms' => 500,
            'available_rooms' => 500,
            'location' => 'Test Location',
            'postcode' => '000000',
        ])
            ->assertOk();

        $this->assertDatabaseHas('hotels', [
            'id' => $this->hotel->id
        ]);
    }

    public function test_delete_hotel(): void
    {
        $this->deleteJson(route('hotels.destroy', $this->hotel->id))
            ->assertNoContent();

        $this->assertDatabaseMissing('hotels', [
            'id' => $this->hotel->id
        ]);
    }
}

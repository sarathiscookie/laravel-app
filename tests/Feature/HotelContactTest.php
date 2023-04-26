<?php

namespace Tests\Feature;

use App\Models\HotelContact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelContactTest extends TestCase
{
    use RefreshDatabase;

    private $hotel;

    private $hotelContact;

    public function setUp(): void
    {
        parent::setUp();
        
        $this->authUser();

        $this->hotel = $this->createHotel();

        $this->hotelContact = $this->createHotelContact(['hotel_id' => $this->hotel->id]);
    }
    
    public function test_fetch_all_contacts_of_a_hotel(): void
    {
        $response = $this->getJson(route('hotels.contacts.index', $this->hotel->id));

        $response->assertOk();

        //$this->assertEquals(1, count($response->json()));
        //$this->assertEquals($response->json()['hotel_id'], $this->hotel->id);
    }

    public function test_store_a_contact_for_a_hotel(): void
    {
        $hotelContact = HotelContact::factory()->make();

        $this->postJson(route('hotels.contacts.store', $this->hotel->id), [
            'hotel_id' => $this->hotel->id,
            'email' => $hotelContact->email,
            'phone' => $hotelContact->phone
        ])
            ->assertCreated();

        $this->assertDatabaseHas('hotel_contacts', [
            'email' => $hotelContact->email,
            'hotel_id' => $this->hotel->id
        ]);
    }

    public function test_update_a_contact(): void
    {
        $this->patchJson(route('contacts.update', $this->hotelContact->id), [
            //
        ])
            ->assertOk();
    }

    public function test_delete_a_contact(): void
    {
        $this->deleteJson(route('contacts.destroy', $this->hotelContact->id))
            ->assertNoContent();
    }
}

<?php

namespace Tests\Unit;

use App\Models\Hotel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HotelContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_belongs_to_a_hotel(): void
    {
        $this->authUser();
        
        $hotel = $this->createHotel();

        $hotelContact = $this->createHotelContact(['hotel_id' => $hotel->id]);
        
        $this->assertInstanceOf(Hotel::class, $hotelContact->hotel);
    }
}

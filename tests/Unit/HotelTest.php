<?php

namespace Tests\Unit;

use App\Models\HotelContact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HotelTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_a_hotel_can_has_many_contacts(): void
    {
        $this->authUser();
        
        $hotel = $this->createHotel();

        $hotelContact = $this->createHotelContact(['hotel_id' => $hotel->id]);

        $this->assertInstanceOf(Collection::class, $hotel->hotelContacts);

        $this->assertInstanceOf(HotelContact::class, $hotel->hotelContacts->first());
    }
}

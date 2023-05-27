<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Hotel;
use Tests\TestCase;

class RoomTypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_room_type_belongs_to_a_hotel(): void
    {
        $this->authUser();
        
        $hotel = $this->createHotel();

        $roomType = $this->createRoomType(['hotel_id' => $hotel->id]);
        
        $this->assertInstanceOf(Hotel::class, $roomType->hotel);
    }
}

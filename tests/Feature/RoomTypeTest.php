<?php

namespace Tests\Feature;

use App\Models\RoomType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoomTypeTest extends TestCase
{
    use RefreshDatabase;

    private $hotel;

    private $roomType;

    public function setUp(): void
    {
        parent::setUp();

        $this->authUser();

        $this->hotel = $this->createHotel();

        $this->roomType = $this->createRoomType(['hotel_id' => $this->hotel->id]);
    }

    public function test_fetch_all_room_types_of_a_hotel(): void
    {
        $response = $this->getJson(route('hotels.roomtypes.index', $this->hotel->id));

        $response->assertOk();

        $this->assertEquals(1, count($response->json()));
    }

    public function test_store_a_room_type_for_a_hotel(): void
    {
        $roomType = RoomType::factory()->make();

        $this->postJson(route('hotels.roomtypes.store', $this->hotel->id), [
            'hotel_id' => $this->hotel->id,
            'name' => $roomType->name
        ])
            ->assertCreated();

        $this->assertDatabaseHas('room_types', [
            'name' => $roomType->name,
            'hotel_id' => $this->hotel->id
        ]);
    }

    public function test_update_a_room_type(): void
    {
        $this->patchJson(route('roomtypes.update', $this->roomType->id), [
            'hotel_id' => $this->hotel->id,
            'name' => 'Dormitory'
        ])
            ->assertOk();
    }

    public function test_delete_a_room_type(): void
    {
        $this->deleteJson(route('roomtypes.destroy', $this->roomType->id))
            ->assertNoContent();
    }
}

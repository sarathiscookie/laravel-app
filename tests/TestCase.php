<?php

namespace Tests;

use App\Models\Hotel;
use App\Models\HotelContact;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    public function createUser()
    {
        return User::factory()->create();
    }

    public function authUser()
    {
        $user = $this->createUser();

        Sanctum::actingAs(
            $user,
            ['*']
        );

        return $user;
    }

    public function createHotel()
    {
        return Hotel::factory()->create();
    }

    public function createHotelContact($args = [])
    {
        return HotelContact::factory()->create($args);
    }

    public function createRoomType($args = [])
    {
        return RoomType::factory()->create($args);
    }
}

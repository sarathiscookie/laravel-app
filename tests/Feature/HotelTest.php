<?php

namespace Tests\Feature;

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
    
    /**
     * A basic feature test example.
     */
    public function test_fetch_all_hotels(): void
    {
        $response = $this->getJson(route('hotels.index'));

        $response->assertStatus(200);
    }
}

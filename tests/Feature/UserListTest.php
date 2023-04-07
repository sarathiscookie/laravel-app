<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\CitySeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\StateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserListTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * A basic feature test example.
     */
    public function test_fetch_all_users(): void
    {
        $response = $this->getJson('/api/users');

        $response->assertStatus(200);
    }

    public function test_fetch_single_user(): void
    {
        $response = $this->getJson(route('users.show', $this->user->id))
                        ->assertOk();

        $this->assertGreaterThan(2, $response->json()['role_id']);
    }
}

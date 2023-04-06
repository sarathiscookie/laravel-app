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

    /**
     * A basic feature test example.
     */
    public function test_fetch_all_users(): void
    {
        // Preparation
        User::factory(5)->create();

        // Action
        $response = $this->getJson('/api/users');

        // Assertion (predict)
        $response->assertStatus(200);
    }

    public function test_fetch_single_user(): void
    {
        // Preparation
        User::factory(5)->create();

        // Action
        $response = $this->getJson(route('users.show', 3));

        // Assertion (predict)
        $response->assertStatus(200);

        $this->assertEquals(3, $response->json()['role_id']);
    }
}

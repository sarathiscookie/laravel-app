<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_get_users_index(): void
    {
        // Preparation
        Country::factory()->create();
        State::factory()->create();
        City::factory()->create();
        $this->seed([
            RoleSeeder::class
        ]);
        User::factory()->create();

        // Action
        $response = $this->getJson('/api/users');

        // Assertion (predict)
        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->has(1)
                    ->first(fn (AssertableJson $json) =>
                        $json->where('id', 1)
                            ->where('role_id', 3)
                            ->etc()
                    )
            )
            ->assertStatus(200);
    }
}

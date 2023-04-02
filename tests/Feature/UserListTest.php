<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Country;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        
        $roles = [
            [
                'name' => 'Admin',
                'status' => 'active',
            ],
            [
                'name' => 'Hotel Owner',
                'status' => 'active',
            ],
            [
                'name' => 'Hotel Manager',
                'status' => 'active',
            ],
            [
                'name' => 'Hotel Accountant',
                'status' => 'active',
            ],
            [
                'name' => 'Hotel Receptionist',
                'status' => 'active',
            ],
        ];

        foreach ($roles as $role) {
            Role::insert($role);
        }

        User::factory()->create();

        // Action
        $response = $this->getJson('/api/users'); 

        // Debug
        /*$response->dumpHeaders();
        $response->dumpSession();
        $response->dump();*/

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

        //$this->assertEquals(3, $response[0]['role_id']);
    }
}

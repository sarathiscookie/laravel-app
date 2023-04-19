<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAuthTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    public function test_user_login_with_email_and_password(): void
    {
        $response = $this->postJson(route('login'), [
            'email' => $this->user->email,
            'password' => 'password'
        ])
        ->assertOk();

        $this->assertArrayHasKey('token', $response->json());
    }

    public function test_login_if_email_is_incorrect(): void
    {
        $this->postJson(route('login'), [
            'email' => 'test@example.com',
            'password' => 'password'
        ])
        ->assertUnauthorized();
    }

    public function test_login_if_password_is_incorrect(): void
    {
        $this->postJson(route('login'), [
            'email' => $this->user->email,
            'password' => 'random'
        ])
        ->assertUnauthorized();
    }
}

<?php

namespace Tests;

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
}

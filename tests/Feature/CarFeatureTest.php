<?php

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Tests\TestCase;

class CarFeatureTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $user = UserFactory::new()->create();

        $this->actingAs($user);
    }

    public function test_get_cars(): void
    {
        $response = $this->get('/api/cars');

        $response->assertStatus(200);
    }
}

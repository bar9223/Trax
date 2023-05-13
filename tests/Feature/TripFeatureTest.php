<?php

namespace Tests\Feature;

use App\Car;
use App\Trip;
use Database\Factories\UserFactory;
use Tests\TestCase;

class TripFeatureTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user = UserFactory::new()->create();

        $this->actingAs($this->user);
    }

    public function test_get_trips_for_authenticated_user(): void
    {
        $car = Car::factory()->create(['user_id' => $this->user->id]);
        $trip = Trip::factory()->create(['car_id' => $car->id]);

        $response = $this->json('GET', '/api/trips');
        $response->assertStatus(200)
            ->assertJson([
                [
                    'id' => $trip->id,
                    'date' => $trip->date,
                    'miles' => $trip->miles,
                    'car_id' => $car->id,
                    'car_make' => $car->make,
                    'car_model' => $car->model,
                ]
            ]);
    }
}

<?php

namespace Database\Factories;

use App\Car;
use App\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    protected $model = Trip::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->date('Y-m-d'),
            'miles' => $this->faker->randomFloat(1, 0, 1000),
            'car_id' => function() {
                return Car::factory()->create()->id;
            }
        ];
    }
}

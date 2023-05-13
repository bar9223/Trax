<?php

namespace Database\Factories;

use App\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        return [
            'make' => $this->faker->company,
            'model' => $this->faker->word,
            'year' => $this->faker->year,
            'user_id' => function() {
                return UserFactory::new()->create()->id;
            }
        ];
    }
}

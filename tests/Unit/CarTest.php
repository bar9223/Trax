<?php

namespace Tests\Unit;

use App\Car;
use PHPUnit\Framework\TestCase;

class CarTest extends TestCase
{
    public function test_create_car(): void
    {
        $car = new Car();
        $car->make = 'Citroen';
        $car->model = 'C4';
        $car->year = 2020;

        $this->assertEquals('Citroen', $car->make);
        $this->assertEquals('C4', $car->model);
        $this->assertEquals(2020, $car->year);
    }
}

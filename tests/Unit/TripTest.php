<?php

namespace Tests\Unit;

use App\Trip;
use PHPUnit\Framework\TestCase;

class TripTest extends TestCase
{
    public function test_create_trip(): void
    {
        $trip = new Trip();
        $trip->date = '2023-05-13';
        $trip->miles = 120;

        $this->assertEquals('2023-05-13', $trip->date);
        $this->assertEquals(120, $trip->miles);
    }
}

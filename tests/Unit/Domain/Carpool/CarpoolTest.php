<?php

namespace Tests\Unit\Domain;

use PHPUnit\Framework\TestCase;
use App\Domain\Carpool\Carpool;

class CarpoolTest extends TestCase
{

    public function testConstructAValidCarpool()
    {
        $carpool = new Carpool(['zone' => 10, 'maxOfPassengers' => 3, 'location' => [0.1, 0.12], 'numberOfPassengers' => 0]);

        $this->assertTrue($carpool->haveASit());
        $this->assertEquals($carpool->latitude(), 0.1);
        $this->assertEquals($carpool->longitude(), 0.12);
        $this->assertEquals($carpool->zone(), 10);
    }

    public function testValidCarpoolShouldHaveNoSit()
    {
        $carpool = new Carpool(['zone' => 10, 'maxOfPassengers' => 3, 'location' => [0.1, 0.12], 'numberOfPassengers' => 3]);
        $this->assertFalse($carpool->haveASit());
    }
}

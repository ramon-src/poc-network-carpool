<?php

namespace Tests\Unit\Domain;

use PHPUnit\Framework\TestCase;

use App\Domain\Carpool\CarpoolFactory;
use App\Domain\Validators\ValidatorException;

class CarpoolFactoryTest extends TestCase
{

    public function testConstructANewValidCarpool()
    {
        $carpool = CarpoolFactory::make(['zone' => 10, 'maxOfPassengers' => 3, 'location' => '0.1,0.12', 'numberOfPassengers' => 0]);

        $this->assertTrue($carpool->haveASit());
        $this->assertEquals($carpool->latitude(), 0.1);
        $this->assertEquals($carpool->longitude(), 0.12);
        $this->assertEquals($carpool->zone(), 10);
    }

    public function testConstructARecoveredValidCarpool()
    {
        $carpool = CarpoolFactory::recover(['id' => 'asda12d1a', 'zone' => 10, 'maxOfPassengers' => 3, 'location' => '0.1,0.12', 'numberOfPassengers' => 0]);

        $this->assertTrue($carpool->haveASit());
        $this->assertEquals($carpool->latitude(), 0.1);
        $this->assertEquals($carpool->longitude(), 0.12);
        $this->assertEquals($carpool->zone(), 10);
    }

    public function testShouldThrowExceptionWhenMakeCarpoolWithInvalidData()
    {
        $this->expectException(ValidatorException::class);
        CarpoolFactory::make([]);
    }

    public function testShouldThrowExceptionWhenRecoverCarpoolWithInvalidData()
    {
        $this->expectException(ValidatorException::class);
        CarpoolFactory::recover([]);
    }
}

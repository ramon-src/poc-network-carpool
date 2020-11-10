<?php

namespace Tests\Unit\Domain;

use App\Domain\Event\Event;
use PHPUnit\Framework\TestCase;

use App\Domain\Passenger\PassengerFactory;
use App\Domain\Validators\ValidatorException;

class PassengerFactoryTest extends TestCase
{

    public function testConstructANewValidPassenger()
    {
        $passenger = PassengerFactory::make(['event' => new Event(['id' => '213as1da', 'initialDate' => '', 'finalDate' => '']), 'location' => '0.1,0.12']);

        $this->assertEquals($passenger->latitude(), 0.1);
        $this->assertEquals($passenger->longitude(), 0.12);
    }

    public function testConstructARecoveredValidPassenger()
    {
        $passenger = PassengerFactory::recover(['id' => '2asd12asda6', 'event' => new Event(['id' => '213as1da', 'initialDate' => '', 'finalDate' => '']), 'location' => '0.1,0.12']);

        $this->assertEquals($passenger->latitude(), 0.1);
        $this->assertEquals($passenger->longitude(), 0.12);
    }

    public function testShouldThrowExceptionWhenMakePassengerWithInvalidData()
    {
        $this->expectException(ValidatorException::class);
        PassengerFactory::make([]);
    }

    public function testShouldThrowExceptionWhenRecoverCarpoolWithInvalidData()
    {
        $this->expectException(ValidatorException::class);
        PassengerFactory::recover([]);
    }
}

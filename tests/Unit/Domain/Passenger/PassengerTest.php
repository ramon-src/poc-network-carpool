<?php

namespace Tests\Unit\Domain;

use App\Domain\Event\Event;
use App\Domain\Passenger\Passenger;
use PHPUnit\Framework\TestCase;

class PassengerTest extends TestCase
{

    public function testConstructAValidPassenger()
    {
        $passenger = new Passenger(['id' => '2asd12asda6', 'event' => new Event(['id' => '213as1da', 'initialDate' => '', 'finalDate' => '']), 'location' => [0.1, 0.12], 'waiting' => false]);

        $this->assertTrue($passenger->hasLocation());
        $this->assertEquals($passenger->latitude(), 0.1);
        $this->assertEquals($passenger->longitude(), 0.12);
    }
}

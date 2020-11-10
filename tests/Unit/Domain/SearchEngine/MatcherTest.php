<?php

namespace Tests\Unit\Domain;

use PHPUnit\Framework\TestCase;

use App\Domain\SearchEngine\Matcher;
use App\Domain\Carpool\CarpoolFactory;
use App\Domain\Passenger\PassengerFactory;

class MatcherTest extends TestCase
{

    public function testConstructAValidMatcherAndGetOneMatch()
    {
        $passenger = PassengerFactory::make(['id' => '2asd12asda6', 'event' => ['id' => '213as1da', 'dates' => []], 'location' => '-30.040827,-51.223532', 'waiting' => false]);
        $expectedNearCarpool = CarpoolFactory::recover(['id' => '2asd12asda6', 'zone' => 1, 'maxOfPassengers' => 3, 'location' => '-30.040913,-51.218550', 'numberOfPassengers' => 0]);
        $carpool2 = CarpoolFactory::recover(['id' => '3asd12asda6', 'zone' => 1, 'maxOfPassengers' => 3, 'location' => '-30.049314,-51.227932', 'numberOfPassengers' => 0]);

        $matcher = new Matcher($passenger, [$expectedNearCarpool, $carpool2]);
        $nearestCarpools = $matcher->execute();

        $this->assertSame($nearestCarpools, [$expectedNearCarpool]);
    }
}

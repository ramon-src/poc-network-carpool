<?php

namespace App\Domain\SearchEngine;

use App\Domain\Carpool\Carpool;
use App\Domain\Passenger\Passenger;

class Matcher
{

    private $passenger;
    private $carPools;
    private $unit;
    private $nearestPools;

    /**
     * @param Passenger[] $passenger
     * @param Carpool[] $carpools
     * @param string $unit
     */
    public function __construct(Passenger $passenger, array $carpools, string $unit = 'Km')
    {
        $this->passenger = $passenger;
        $this->carPools = $carpools;
        $this->unit = $unit;
        $this->nearestPools = [];
    }

    /**
     * Returns a list of Carpool objects
     * @return Carpool[]
     */
    private function getNearestPools(): array
    {
        foreach ($this->carPools as $carpool) {

            if (!$carpool->haveASit()) {
                continue;
            }

            $passengerLongitude = $this->passenger->longitude();
            $passengerLatitude = $this->passenger->latitude();
            $carpoolLongitude = $carpool->longitude();
            $carpoolLatitude = $carpool->latitude();

            $theta = $passengerLongitude - $carpoolLongitude;
            $distance = sin(deg2rad($passengerLatitude)) * sin(deg2rad($carpoolLatitude)) + cos(deg2rad($passengerLatitude)) * cos(deg2rad($carpoolLatitude)) * cos(deg2rad($theta));

            $distance = acos($distance);
            $distance = rad2deg($distance);
            $distance = $distance * 60 * 1.1515;

            switch ($this->unit) {
                case 'Mi':
                    break;
                case 'Km':
                    $distance = $distance * 1.609344;
            }

            $distancePassengerTargetAndCarpool = (round($distance, 2));

            if ($carpool->zone() >= $distancePassengerTargetAndCarpool) {
                array_push($this->nearestPools, $carpool);
            }
        }
        return $this->nearestPools;
    }

    /**
     * Returns a list of Carpool objects
     * @return Carpool[]
     */
    public function execute(): array
    {
        return $this->getNearestPools();
    }
}

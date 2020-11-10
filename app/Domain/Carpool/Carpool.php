<?php

namespace App\Domain\Carpool;

use App\Domain\EntityInterface;

class Carpool implements EntityInterface
{

    private $id;
    private $zone;
    private $maxOfPassengers;
    private $location;
    private $numberOfPassengers;

    public function __construct(array $info)
    {
        if (array_key_exists("id", $info)) {
            $this->id = $info['id'];
        }
        $this->zone = $info['zone'];
        $this->maxOfPassengers = $info['maxOfPassengers'];
        $this->location = $info['location'];
        $this->numberOfPassengers = $info['numberOfPassengers'];
    }

    public function id(): string
    {
        return $this->id;
    }

    public function latitude()
    {
        return $this->location[0];
    }

    public function longitude()
    {
        return $this->location[1];
    }

    public function haveASit()
    {
        return $this->maxOfPassengers > $this->numberOfPassengers;
    }

    public function zone()
    {
        return $this->zone;
    }
}

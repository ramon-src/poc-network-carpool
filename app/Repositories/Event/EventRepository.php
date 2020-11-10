<?php

namespace App\Repositories\Event;

use App\Domain\Passenger\Passenger;

interface EventRepository
{
    public function getAvailableCarpools(Passenger $passenger): array;
}

<?php

namespace App\Repositories\Event;

use App\Domain\Carpool\CarpoolFactory;
use App\Domain\Passenger\Passenger;
use App\Models\CarpoolModel;

class EventEloquentRepository implements EventRepository
{

    public function getAvailableCarpools(Passenger $passenger): array
    {
        $carpoolsData = CarpoolModel::where('event_id', $passenger->eventId())->get();

        $Carpools = [];
        foreach ($carpoolsData as $carpoolData) {
            array_push($Carpools, CarpoolFactory::recover($carpoolData));
        }

        return $Carpools;
    }
}

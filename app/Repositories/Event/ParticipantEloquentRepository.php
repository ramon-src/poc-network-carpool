
<?php

namespace App\Repositories\Event;

use App\Domain\Passenger\Passenger;
use App\Domain\Passenger\PassengerFactory;
use App\Models\ParticipantModel;

class ParticipantEloquentRepository implements ParticipantRepository
{

    public function getParticipant(string $participantId): Passenger
    {
        $participantData = ParticipantModel::find($participantId);
        return PassengerFactory::recover($participantData);
    }
}

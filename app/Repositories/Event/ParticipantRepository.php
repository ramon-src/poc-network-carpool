<?php

namespace App\Repositories\Event;

use App\Domain\Passenger\Passenger;

interface ParticipantRepository
{
    public function getParticipant(string $participantId): Passenger;
}

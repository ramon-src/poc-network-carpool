<?php

namespace App\Domain\Passenger;

use App\Domain\EntityInterface;

class Passenger implements EntityInterface
{
    private $id;
    private $event;
    private $location;

    public function __construct(array $info)
    {
        if (array_key_exists("id", $info)) {
            $this->id = $info['id'];
        }
        $this->event = $info['event'];
        $this->location = $info['location'];
    }

    public function id(): string
    {
        return $this->id;
    }

    public function eventId(): string
    {
        return $this->event->getId();
    }

    public function hasLocation(): bool
    {
        return sizeof($this->location) == 2;
    }

    public function latitude(): float
    {
        return $this->location[0];
    }

    public function longitude(): float
    {
        return $this->location[1];
    }
}

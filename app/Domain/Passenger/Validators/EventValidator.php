<?php

namespace App\Domain\Passenger\Validators;

use App\Domain\Validators\Validator;

class EventValidator implements Validator
{
    public function verify(array $data): ?string
    {
        if (!array_key_exists("event", $data) || empty($data["event"])) {
            return "Event is required";
        }
        return false;
    }
}

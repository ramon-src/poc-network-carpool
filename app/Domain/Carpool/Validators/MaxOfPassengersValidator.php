<?php

namespace App\Domain\Carpool\Validators;

use App\Domain\Validators\Validator;

class MaxOfPassengersValidator implements Validator
{
    public function verify(array $data): ?string
    {
        if (!array_key_exists("maxOfPassengers", $data) || empty($data["maxOfPassengers"])) {
            return "Max of Passengers is required";
        }
        return false;
    }
}

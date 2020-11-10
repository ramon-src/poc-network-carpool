<?php

namespace App\Domain\Carpool\Validators;

use App\Domain\Validators\Validator;

class NumberOfPassengersValidator implements Validator
{
    public function verify(array $data): ?string
    {
        if (!array_key_exists("numberOfPassengers", $data) || !is_numeric($data["numberOfPassengers"])) {
            return "The number of passengers is required";
        }
        return false;
    }
}

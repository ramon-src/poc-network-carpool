<?php

namespace App\Domain\Carpool\Validators;

use App\Domain\Validators\Validator;

class ZoneValidator implements Validator
{
    public function verify(array $data): ?string
    {
        if (!array_key_exists("zone", $data) || empty($data["zone"])) {
            return "Zone is required";
        }
        return false;
    }
}

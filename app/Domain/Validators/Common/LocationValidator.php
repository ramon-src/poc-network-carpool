<?php

namespace App\Domain\Validators\Common;

use App\Domain\Validators\Validator;

class LocationValidator implements Validator
{
    public function verify(array $data): ?string
    {
        if (!array_key_exists("location", $data) || empty($data["location"])) {
            return "The coordinates is required";
        }

        return false;
    }
}

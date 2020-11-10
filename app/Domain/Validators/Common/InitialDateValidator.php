<?php

namespace App\Domain\Validators\Common;

use App\Domain\Validators\Validator;

class InitialDateValidator implements Validator
{
    public function verify(array $data): ?string
    {
        if (!array_key_exists("initialDate", $data) || empty($data["initialDate"])) {
            return "Initial date is required";
        }
        return false;
    }
}

<?php

namespace App\Domain\Validators\Common;

use App\Domain\Validators\Validator;

class FinalDateValidator implements Validator
{
    public function verify(array $data): ?string
    {
        if (!array_key_exists("finalDate", $data) || empty($data["finalDate"])) {
            return "Final date is required";
        }
        return false;
    }
}

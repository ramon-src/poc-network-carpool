<?php

namespace App\Domain\Validators\Common;

use App\Domain\Validators\Validator;

class IdValidator implements Validator
{
    public function verify(array $data): ?string
    {
        if (!array_key_exists("id", $data) || empty($data["id"])) {
            return "Id is required";
        }
        return false;
    }
}

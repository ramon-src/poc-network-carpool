<?php

namespace App\Domain\Validators;

class ValidatorException extends \Exception
{
    public function __construct(array $data)
    {
        $this->message = "Instable Domain Object: " . implode(",", $data);
    }
}

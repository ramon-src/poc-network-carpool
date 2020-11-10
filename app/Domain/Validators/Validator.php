<?php

namespace App\Domain\Validators;

interface Validator
{
    public function verify(array $data): ?string;
}

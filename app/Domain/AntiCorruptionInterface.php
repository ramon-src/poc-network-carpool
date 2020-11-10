<?php

namespace App\Domain;

interface AntiCorruptionInterface
{
    public static function execute(array $data): array;
}

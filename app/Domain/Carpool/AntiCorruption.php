<?php

namespace App\Domain\Carpool;

use App\Domain\AntiCorruptionInterface;

class AntiCorruption implements AntiCorruptionInterface
{
    public static function execute(array $data): array
    {
        $data['location'] = explode(',', $data['location']);
        return $data;
    }
}

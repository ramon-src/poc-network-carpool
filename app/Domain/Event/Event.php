<?php

namespace App\Domain\Event;

use App\Domain\EntityInterface;

class Event implements EntityInterface
{
    private $id;
    private $initialDate;
    private $finalDate;

    public function __construct(array $info)
    {
        $this->id = $info['id'];
        $this->initialDate = $info['initialDate'];
        $this->finalDate = $info['finalDate'];
    }

    public function id(): string
    {
        return $this->id;
    }
}

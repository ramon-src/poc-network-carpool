<?php

namespace App\Domain\Event;

use App\Domain\Validators\Common\FinalDateValidator;
use App\Domain\Validators\Common\InitialDateValidator;
use App\Domain\Validators\ValidatorChain;

class EventFactory
{

    public static function make(array $info): Event
    {
        $validator = new ValidatorChain($info);
        $validator->add(InitialDateValidator::class)
            ->add(FinalDateValidator::class)
            ->execute();

        return new Event($info);
    }

    public static function recover(array $info): Event
    {
        $validator = new ValidatorChain($info);
        $validator->add(IdValidator::class)
            ->add(InitialDateValidator::class)
            ->add(FinalDateValidator::class)
            ->execute();

        return new Event($info);
    }
}

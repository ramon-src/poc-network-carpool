<?php

namespace App\Domain\Passenger;

use App\Domain\Passenger\Passenger;

use App\Domain\Validators\ValidatorChain;
use App\Domain\Validators\Common\IdValidator;
use App\Domain\Validators\Common\LocationValidator;

use App\Domain\Passenger\Validators\EventValidator;

class PassengerFactory
{

    public static function make(array $info): Passenger
    {
        $validator = new ValidatorChain($info);
        $validator->add(EventValidator::class)
            ->add(LocationValidator::class)
            ->execute();

        $dataFormatted = AntiCorruption::execute($info);

        return new Passenger($dataFormatted);
    }

    public static function recover(array $info): Passenger
    {
        $validator = new ValidatorChain($info);
        $validator->add(IdValidator::class)
            ->add(EventValidator::class)
            ->add(LocationValidator::class)
            ->execute();

        $dataFormatted = AntiCorruption::execute($info);

        return new Passenger($dataFormatted);
    }
}

<?php

namespace App\Domain\Carpool;

use App\Domain\Carpool\AntiCorruption;
use App\Domain\Carpool\Carpool;
use App\Domain\Validators\Common\IdValidator;
use App\Domain\Validators\Common\LocationValidator;

use App\Domain\Carpool\Validators\MaxOfPassengersValidator;
use App\Domain\Carpool\Validators\NumberOfPassengersValidator;
use App\Domain\Carpool\Validators\ZoneValidator;

use App\Domain\Validators\ValidatorChain;

class CarpoolFactory
{

    public static function make(array $info): Carpool
    {
        $validator = new ValidatorChain($info);
        $validator->add(ZoneValidator::class)
            ->add(MaxOfPassengersValidator::class)
            ->add(NumberOfPassengersValidator::class)
            ->add(LocationValidator::class)
            ->execute();

        $dataFormatted = AntiCorruption::execute($info);

        return new Carpool($dataFormatted);
    }

    public static function recover(array $info): Carpool
    {
        $validator = new ValidatorChain($info);
        $validator->add(IdValidator::class)
            ->add(ZoneValidator::class)
            ->add(MaxOfPassengersValidator::class)
            ->add(NumberOfPassengersValidator::class)
            ->add(LocationValidator::class)
            ->execute();

        $dataFormatted = AntiCorruption::execute($info);

        return new Carpool($dataFormatted);
    }
}

<?php

namespace App\Domain\Validators;

class ValidatorChain
{
    private $validators;
    private $failedValidators;
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->validators = [];
        $this->failedValidators = [];
    }

    public function add(string $validator)
    {
        array_push($this->validators, $validator);
        return $this;
    }

    public function isValid()
    {
        return sizeof($this->failedValidators) === 0;
    }

    public function execute()
    {
        foreach ($this->validators as $validator) {
            $intance = new $validator();
            $hasFailedMessage = $intance->verify($this->data);

            if ($hasFailedMessage) {
                array_push($this->failedValidators, $hasFailedMessage);
            }
        }

        if (!$this->isValid()) {
            throw new ValidatorException($this->failedValidators);
        }
    }
}

<?php
namespace App\SpecValidators;

class Rule
{
    public $errorMessage;
    private $specification;

    public function __construct($specification, $errorMessage)
    {
        $this->specification = $specification;
        $this->errorMessage = $errorMessage;
    }

    public function validate(object $obj)
    {
        return $this->specification->isSatisfiedBy($obj);
    }
}
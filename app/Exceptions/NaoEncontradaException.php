<?php
namespace App\Exceptions;

class NaoEncontradaException extends GeneralValidationException
{
    public function __construct($id)
    {
        $this->message = "Não existe registro com o código $id";
    }
}

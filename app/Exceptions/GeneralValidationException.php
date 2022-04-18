<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class GeneralValidationException extends \Exception
{
   protected $errors;

   public function validationException()
   {
       $errors = is_null($this->errors) ? [$this->message] : $this->errors;
       $errorMessages[0] = array_merge($errors);
       return ValidationException::withMessages($errorMessages);
   }
}


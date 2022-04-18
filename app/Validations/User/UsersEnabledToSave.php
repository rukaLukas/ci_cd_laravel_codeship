<?php
namespace App\Validations\User;

use App\SpecValidators\Rule;
use App\SpecValidators\SpecValidator;
use App\Specifications\Users\ChildSpecification;
use App\Specifications\Users\UniqueEmailSpecification;

class UsersEnabledToSave extends SpecValidator
{
    public function __construct()
    {
        $childSpec = new ChildSpecification();
        $uniqueEmail = new UniqueEmailSpecification();
        
        $this->add('childSpec', new Rule($childSpec, 'Usuário deve ser criança'));
        $this->add('uniqueEmail', new Rule($uniqueEmail, 'E-mail já cadastrado!'));
    }
}
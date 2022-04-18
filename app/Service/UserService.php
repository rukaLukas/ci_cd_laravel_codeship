<?php
namespace App\Service;

use App\Models\User;
use App\Exceptions\GeneralException;
use App\Exceptions\NaoEncontradaException;
use App\Validations\User\UsersEnabledToSave;
use App\Interfaces\Service\UserServiceInterface;
use App\Interfaces\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function list() 
    {
        return $this->repository->getAll();
    }

    public function search($id) 
    {
        $users = $this->repository->getById($id);
        
        throw_if(is_null($users), new NaoEncontradaException($id));
        
        return $users;
    }

    public function store(array $data)
    {
        $user = new User($data);
  
        $usersEnabledToSave = new UsersEnabledToSave();

        throw_if(!$usersEnabledToSave->validate($user)->isValid(), new GeneralException($usersEnabledToSave->getErrors()));
        
        return $this->repository->save($data);
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function destroy($id) 
    {
        $users = $this->repository->getById($id);
        
        throw_if(is_null($users), new NaoEncontradaException($id));

        return $this->repository->delete($id);
    }
}

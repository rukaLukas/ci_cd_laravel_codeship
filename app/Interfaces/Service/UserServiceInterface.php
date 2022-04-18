<?php
namespace App\Interfaces\Service;

interface UserServiceInterface
{
    public function list();
    public function search($id);
    public function store(array $data);
    public function update(array $data, $id);
    public function destroy($id);
}
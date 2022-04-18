<?php
namespace App\Interfaces\Repository;

use Illuminate\Http\Client\Request;

interface UserRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function save(array $request);
    public function update(array $data, $id);
    public function delete($id);
}

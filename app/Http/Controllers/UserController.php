<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Response;
use App\Exceptions\ApiException;
use App\Exceptions\BaseException;
use App\Exceptions\GeneralException;
use App\Exceptions\GeneralValidationException;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserCreateRequest;
use App\Exceptions\NaoEncontradaException;
use App\Interfaces\Service\UserServiceInterface;
use Exception;

class UserController extends Controller
{
    private $service;

    public function __construct(UserServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $user = $this->service->list();
        return UserResource::collection($user);
    }

    public function show($id)
    {
        try {
            return $this->service->search($id);
        } catch (GeneralValidationException $ex) {
            throw $ex->validationException();
        }
    }

    public function store(UserCreateRequest $request)
    {
        try {
            $user = $this->service->store([
                // Dados
                'name' => $request->name,
                'email' => $request->email
            ]);
        } catch (GeneralValidationException $ex) {
            throw $ex->validationException();
        }

        return response(new UserResource($user), Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->service->update([
                // Dados
                'name' => $request->name,
                'email' => $request->email
            ], $id);
        } catch (GeneralValidationException $ex) {
            throw $ex->validationException();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->destroy($id);
        } catch (GeneralValidationException $ex) {
            throw $ex->validationException();
        }
    }

}

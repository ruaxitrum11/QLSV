<?php

namespace App\Services\Client;


use App\Entites\Client;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class RegisterServices
{
    protected $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->userRepository = $user_repository;
    }

    public function create(array $request)
    {
        $number_id = $this->getLatestNumberId();

        if ($number_id) {
            $number_id = $number_id->number_id + 1;
        } else {
            $client_id = 10000000;
            $number_id = $client_id;
        }

        $client_input = [
            'email' => $request['email'],
            'name' => $request['name'],
            'number_id' => $number_id,
            'password' => bcrypt($request['password']),
        ];

        $result = $this->userRepository->store($client_input);

        return $result;
    }

    protected function getLatestNumberId()
    {
        $result = $this->userRepository->getLatestNumberId();

        return $result;
    }
}
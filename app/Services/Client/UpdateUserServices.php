<?php

namespace App\Services\Client;


use App\Entites\Client;
use App\Repositories\Contracts\UpdateUserRepositoryInterface;
use App\Repositories\Eloquents\UpdateUserRepository;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UpdateUserServices
{
    protected $user_repository;

    public function __construct(UpdateUserRepositoryInterface $user_repository)
    {
        $this->userRepository = $user_repository;
    }

    public function edit(int $id, array  $request)
    {
//        dd($request);

        $user_update = [
            'email' => $request['email'],
            'address' => $request['address'],
            'phone_number' => $request['phone_number'],
            'birthday' => $request['birthday'],
            'gender' => $request['gender'],
        ];

        $result = $this->userRepository->update($id, $user_update);

        return $result;
    }

}
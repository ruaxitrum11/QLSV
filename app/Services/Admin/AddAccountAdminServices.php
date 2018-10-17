<?php
/**
 * Created by PhpStorm.
 * User: hieudt
 * Date: 10/17/18
 * Time: 9:50 AM
 */

namespace App\Services\Admin;


use App\Repositories\Eloquents\Admin\AddAccountAdminRepository;

class AddAccountAdminServices
{
    protected $account_repository;

    public function __construct(AddAccountAdminRepository $account_repository)
    {
        $this->account_repository = $account_repository;
    }

    public function add(array $request)
    {

        $number_id = $this->getLatestNumberId();

        if ($number_id) {
            $number_id = $number_id->number_id + 1;
        } else {
            $client_id = 10000000;
            $number_id = $client_id;
        }

        $data = [
            'email' => $request['email'],
            'name' => $request['name'],
            'number_id' => $number_id,
            'password' => bcrypt($request['password']),
        ];

        $result = $this->account_repository->store($data);

        return $result;
    }

    protected function getLatestNumberId()
    {
        $result = $this->account_repository->getLatestNumberId();

        return $result;
    }

}
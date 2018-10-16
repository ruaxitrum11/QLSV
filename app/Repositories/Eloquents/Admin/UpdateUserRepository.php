<?php

namespace App\Repositories\Eloquents\Admin;

use App\Entities\Admin;

class UpdateUserRepository
{
    private $user_model;

    public function __construct(Admin $user_model)
    {
        $this->user_model = $user_model;
    }

    public function update(int $id, array $data)
    {

        $result = $this->user_model->where('id',$id)->update($data);
//        dd(4);
//        dd($result);
        return $result;

    }


}
<?php
/**
 * Created by PhpStorm.
 * User: hieudt
 * Date: 10/17/18
 * Time: 1:27 PM
 */

namespace App\Repositories\Eloquents\Admin;


use App\Entities\Client;

class UpdateAccountClientRepository
{
    private $user_model;

    public function __construct(Client $user_model)
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
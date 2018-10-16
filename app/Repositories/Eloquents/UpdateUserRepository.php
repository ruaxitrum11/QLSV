<?php
/**
 * Created by PhpStorm.
 * User: hieudt
 * Date: 10/11/18
 * Time: 10:39 AM
 */

namespace App\Repositories\Eloquents;

use App\Entities\Client;
use App\User;
use Illuminate\Database\Connection;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\UpdateUserRepositoryInterface;


class UpdateUserRepository implements UpdateUserRepositoryInterface
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
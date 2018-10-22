<?php
/**
 * Created by PhpStorm.
 * User: hieudt
 * Date: 10/22/18
 * Time: 9:23 AM
 */

namespace App\Repositories\Eloquents\Admin;


use App\Entities\Client;

class UpdateScoreRepository
{
    private $user_model;

    public function __construct(Client $user_model)
    {
        $this->user_model = $user_model;
    }

    public function update(array $request, array $user_update, int $id)
    {
        try {
            $client = Client::find($id);

            $client->subjects()->sync($request);

            $this->user_model->where('id',$id)->update($user_update);

            $result = true;
        } catch (\Throwable $e) {
            $result = false;
        }
        return $result;
    }

}
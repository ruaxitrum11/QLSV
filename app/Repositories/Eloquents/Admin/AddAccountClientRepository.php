<?php
/**
 * Created by PhpStorm.
 * User: hieudt
 * Date: 10/17/18
 * Time: 10:27 AM
 */

namespace App\Repositories\Eloquents\Admin;


use App\Entities\Client;

class AddAccountClientRepository
{
    private $client_model;

    public function __construct(Client $client_model)
    {
        $this->client_model = $client_model;
    }

    public function store(array $input)
    {
        $result = $this->client_model->insert($input);

        return $result;
    }

    public function getLatestNumberId()
    {
        $result = $this->client_model->newQuery()
            ->latest('number_id')
            ->first(['number_id']);

        return $result;
    }
}
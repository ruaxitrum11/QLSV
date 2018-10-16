<?php
namespace App\Repositories\Eloquents;


use App\Entities\Client;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;
use Illuminate\Database\Connection;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
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
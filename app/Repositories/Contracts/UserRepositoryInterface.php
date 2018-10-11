<?php

namespace App\Repositories\Contracts;


use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getLatestNumberId();

    public function store(array $input);
}
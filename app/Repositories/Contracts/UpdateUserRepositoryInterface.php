<?php
/**
 * Created by PhpStorm.
 * User: hieudt
 * Date: 10/11/18
 * Time: 10:38 AM
 */
namespace App\Repositories\Contracts;


use Illuminate\Support\Collection;

interface UpdateUserRepositoryInterface
{
    public function update(int $id, array $data);
}
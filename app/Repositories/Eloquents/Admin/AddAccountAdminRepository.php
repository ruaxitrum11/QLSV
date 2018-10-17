<?php
/**
 * Created by PhpStorm.
 * User: hieudt
 * Date: 10/17/18
 * Time: 10:13 AM
 */

namespace App\Repositories\Eloquents\Admin;


use App\Entities\Admin;


class AddAccountAdminRepository
{
    private $admin_modal;


    public function __construct(Admin $admin_model)
    {
        $this->admin_modal = $admin_model;
    }

    public function store(array $data)
    {
        $result = $this->admin_modal->insert($data);

        return $result;
    }
    public function getLatestNumberId()
    {
        $result = $this->admin_modal->newQuery()
            ->latest('number_id')
            ->first(['number_id']);

        return $result;
    }
}
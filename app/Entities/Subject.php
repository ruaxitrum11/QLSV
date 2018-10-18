<?php
/**
 * Created by PhpStorm.
 * User: hieudt
 * Date: 10/18/18
 * Time: 8:44 AM
 */

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Entities\Client');
    }
}
<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'number_id' , 'phone_number' , 'address' , 'gender' , 'avatar' , 'birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function searchUser($query , $search)
//    {
//        return $query->where(function($query) use ($search)
//        {
//
//            $query->where('number_id', 'LIKE', "%{$search}%")
//                ->orWhere('name', 'LIKE', "%{$search}%")
//                ->orWhere('email', 'LIKE', "%{$search}%");
//
//        });
//    }

    public function subjects()
    {
        return $this->belongsToMany('App\Entities\Subject')
            ->withPivot('id', 'score')
            ->withTimestamps();
    }


}

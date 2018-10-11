<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\ClientUpdateRequest;
use App\Services\Client\UpdateUserServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $user_update_service;

    public function __construct(UpdateUserServices $user_update_service)
    {
        $this->user_update_service = $user_update_service;
    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getHome()
    {
//        dd(1);
//        dd($id);
        return view('/client/home');
    }

//    public function updateUser(int $id, ClientUpdateRequest $request )
//    {
//        dd($request);
//        $user_update = $request->all();
//        $user = $this->user_update_service->edit($user_update);
//
//        if ($user) {
//            Session::flash('success', 'Cập nhật dữ liệu thành công');
//            return redirect()->route('client.getHome');
//        } else {
//            Session::flash('error', 'Cập nhật dữ liệu thất bại thất bại');
//            return redirect()->back();
//        }
//    }
}

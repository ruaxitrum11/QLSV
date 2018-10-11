<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\ClientUpdateRequest;
use App\Services\Client\UpdateUserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $user_update_service;

    public function __construct(UpdateUserServices $user_update_service)
    {
        $this->user_update_service = $user_update_service;
    }

    public function show(int $id)
    {
        return view('/client/edit');
    }

    public function update(int $id, ClientUpdateRequest $request)
    {

        $user_update = $request->all();
        $user = $this->user_update_service->edit($id, $user_update);

        if ($user) {
            Session::flash('success', 'Cập nhật dữ liệu thành công');
            return redirect()->route('user.show',$id);
        } else {
            Session::flash('error', 'Cập nhật dữ liệu thất bại thất bại');
            return redirect()->back();
        }
    }
}

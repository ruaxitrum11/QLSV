<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserUpdateRequest;
use App\Services\Admin\UpdateUserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $user_update_service;

    public function __construct(UpdateUserServices $user_update_service)
    {
        $this->user_update_service = $user_update_service;
    }

    public function show(int $id)
    {
        return view('admin.edit');
    }

    public function update(int $id , UserUpdateRequest $request)
    {
        $user_update = $request->all();
//        dd($request);
        $user = $this->user_update_service->edit($id, $user_update);

        if ($user) {
            Session::flash('success', 'Cập nhật dữ liệu thành công');
            return redirect()->route('admin.user.show',$id);
        } else {
            Session::flash('error', 'Cập nhật dữ liệu thất bại thất bại');
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function show()
    {
        return view('admin/login');
    }

    public function post(LoginRequest $request)
    {
        $data = $request->only('email', 'password');
//        dd(Auth::guard('admin')->attempt($data));
        if(Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.home.show');
        }else{
            Session::flash('error','Email hoặc mật khẩu không đúng');
            return redirect()->route('admin.login.show');
        }
    }
}

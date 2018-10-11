<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\ClientLoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return view('/client/login');
    }

    public function postLogin(ClientLoginRequest $request)
    {
        $client_input = $request->only('email', 'password');

        if(Auth::guard('client')->attempt($client_input)) {
            return redirect()->route('client.getHome');
        }else{
            Session::flash('error','Email hoặc mật khẩu không đúng');
            return redirect('/login');
        }

//        return $client;
    }
}

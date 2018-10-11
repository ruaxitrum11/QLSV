<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\ClientRegister;
use App\Services\Client\RegisterServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{

    protected $client_service;

    public function __construct(RegisterServices $client_service)
    {
        $this->client_service = $client_service;
    }

    public function getRegister()
    {
        return view('client/register');
    }

    public function postRegister(ClientRegister $request)
    {
        $client_input = $request->all();

        $client = $this->client_service->create($client_input);
        if ($client) {
            Session::flash('success', 'Bạn đã đăng ký thành công , vui lòng đăng nhập');
            return redirect()->route('client.getLogin');
        } else {
            Session::flash('error', 'Đăng ký thất bại');
            return redirect()->back();
        }
    }

}

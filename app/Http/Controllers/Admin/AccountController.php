<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Client;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function showStudent()
    {
        $client = Client::orderBy('created_at', 'DECS')->paginate(10);
//        dd($client);
        return view('admin.account')->with('client',$client);
    }
}

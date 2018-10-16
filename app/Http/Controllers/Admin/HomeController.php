<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('admin.login.show');
    }

    public function show()
    {
//        dd(1);
        return view('admin/home');
    }
}

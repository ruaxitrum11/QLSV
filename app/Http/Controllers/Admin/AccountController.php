<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Admin;
use App\Entities\Client;
use App\Http\Requests\Admin\AddAccountRequest;
use App\Http\Requests\Admin\UpdateAccountRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Services\Admin\AddAccountAdminServices;
use App\Services\Admin\AddAccountClientServices;
use App\Services\Admin\UpdateAccountAdminServices;
use App\Services\Admin\UpdateAccountClientServices;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    protected $account_admin_services;
    protected $account_client_services;
    protected $update_account_client_services;
    protected $update_account_admin_services;

    public function __construct(AddAccountAdminServices $account_admin_services , AddAccountClientServices $account_client_services ,
UpdateAccountClientServices $update_account_client_services , UpdateAccountAdminServices $update_account_admin_services)
    {
        $this->account_admin_services = $account_admin_services;
        $this->account_client_services = $account_client_services;
        $this->update_account_client_services = $update_account_client_services;
        $this->update_account_admin_services = $update_account_admin_services;
    }

    public function add(AddAccountRequest $request)
    {
        $data = $request->all();
        if($data['account'] == 0) {
            $account = $this->account_client_services->add($data);
            if ($account) {
                Session::flash('success', 'Thêm tài khoản mới thành công');
                return redirect()->route('admin.account.showStudent');
            } else {
                Session::flash('error', 'Đăng ký thất bại');
                return redirect()->back();
            }
        }else{
            $account = $this->account_admin_services->add($data);
            if ($account) {
                Session::flash('success', 'Thêm tài khoản quản trị viên mới thành công');
                return redirect()->route('admin.account.showStudent');
            } else {
                Session::flash('error', 'Đăng ký thất bại');
                return redirect()->back();
            }
        }

    }
    //==================Client==========================

    public function showStudent()
    {
        $client = Client::orderBy('created_at', 'DECS')->paginate(10);
//        dd($client);
        return view('admin.account')->with('client',$client);
    }

    public function infoClient($id)
    {
//        dd($id);
        $info_client = Client::find($id);
//        dd($info_client->subjects);
        return view('admin.info_client')->with('info_client' , $info_client);
    }

    public function showUpdateClient($id)
    {
        $update_client = Client::find($id);
        return view('admin.update_client')->with('update_client' , $update_client);
    }
    public function updateClient(int $id , UpdateAccountRequest $request)
    {
        $user_update = $request->all();
//        dd($request);
        $user = $this->update_account_client_services->edit($id, $user_update);

        if ($user) {
            Session::flash('success', 'Cập nhật dữ liệu thành công');
            return redirect()->route('admin.account.update_client',$id);
        } else {
            Session::flash('error', 'Cập nhật dữ liệu thất bại thất bại');
            return redirect()->back();
        }
    }

    public function deleteClient(int $id)
    {
        $data_delete = false;
        try{
            $client = Client::find($id);
            $data_delete = $client->delete();
            if($data_delete) {
                Session::flash('success', 'Xóa tài khoản người dùng thành công');
                return redirect()->route('admin.account.showStudent');
            }
        }catch (\Exception $e){
            Session::flash('error', 'Xóa tài khoản thất bại');
            return redirect()->route('admin.account.showStudent');
        }
    }

    //==================End Client==========================

    //==================Admin==========================

    public function showTeacher()
    {
        $admin = Admin::orderBy('created_at', 'DECS')->paginate(10);
        return view('admin.account_teacher')->with('admin',$admin);
    }

    public function infoAdmin($id)
    {
//        dd($id);
        $info_admin = Admin::find($id);
//        dd($info_client);
        return view('admin.info_admin')->with('info_admin' , $info_admin);
    }

    public function showUpdateAdmin($id)
    {
        $update_client = Admin::find($id);
        return view('admin.update_admin')->with('update_admin' , $update_client);
    }
    public function updateAdmin(int $id , UpdateAccountRequest $request)
    {
        $user_update = $request->all();
//        dd($request);
        $user = $this->update_account_admin_services->edit($id, $user_update);
//        dd($user);
        if ($user) {
            Session::flash('success', 'Cập nhật dữ liệu thành công');
            return redirect()->route('admin.account.update_admin',$id);
        } else {
            Session::flash('error', 'Cập nhật dữ liệu thất bại thất bại');
            return redirect()->back();
        }
    }

    public function deleteAdmin(int $id)
    {
//        dd($id);
        $data_delete = false;
        try{
            $client = Admin::find($id);
            $data_delete = $client->delete();
            if($data_delete) {
                Session::flash('success', 'Xóa tài khoản người dùng thành công');
                return redirect()->route('admin.account.showTeacher');
            }
        }catch (\Exception $e){
            Session::flash('error', 'Xóa tài khoản thất bại');
            return redirect()->route('admin.account.showTeacher');
        }


    }
    //==================End Admin==========================



}

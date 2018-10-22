@extends('admin/layout')
@section('css')
    /css/admin/home.css
@endsection
@section('account-active','active')
@section('content')
    @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    @if ( Session::has('error') )
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button style="top: -55px!important;right: -28px!important;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb" style="padding: 0!important;">
            <li style="width: 50%;text-align: center;padding: 20px 0;">
                <a href="{{route('admin.account.showStudent')}}" style="font-size: 16px;">Danh sách tài khoản sinh viên</a>
            </li>
            <li style="width: 50%;text-align: center;padding: 20px 0;background: #ddd!important;">
                <a href="{{route('admin.account.showTeacher')}}" style="font-size: 16px;">Danh sách tài khoản giảng viên</a>
            </li>
        </ol>
        <div class="button-add">
            <button onclick="showFormAdd()">Thêm tài khoản</button>
        </div>
        <div class="form-add" style="margin: 10px 0 30px 0;">
            <form action="{{route('admin.account.add')}}" method="post" role="form">
                {{csrf_field()}}
                <div class="form-group" style="float: left;width: 100%;margin-bottom: 20px;">
                    <label style="width: 100%;" for="email">Loại tài khoản:</label>
                    <div style="float: left;width: 100%;">
                        <input checked style="float: left;width: auto;height: auto;margin-top:3px;" type="radio" class="form-control" id="client_account" name="account" value="0">
                        <label style="float: left;margin-left: 20px;" >Tài khoản thường</label>
                    </div>
                    <div style="float: left;width: 100%;">
                        <input style="float: left;width: auto;height: auto;margin-top:3px;" type="radio" class="form-control" id="admin_account" name="account" value="1">
                        <label style="float: left;margin-left: 20px;" >Tài khoản quản trị viên</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Tên đầy đủ:</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Mật khẩu:</label>
                    <input type="password" name="password" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label for="pwd">Xác nhận mật khẩu:</label>
                    <input type="password" name="password_confirmation" id="confirm-password" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </form>
        </div>
        <form action="{{ route('admin.account.showTeacher') }}" method="get" role="form">
            {{csrf_field()}}
            <div class="search-data" style="margin: 20px 0;">
                <input name="search" type="text" placeholder="Nhập Mã , Email hoặc Tên giảng viên" style="width: 30%">
                <button style="cursor: pointer;margin-left: 10px;" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div class="card mb-3">
            {{--@php--}}
            {{--dump($errors);--}}
            {{--@endphp--}}
            {{--{{$admin->total}}--}}
            @if($admin->isEmpty())
                <p style="margin: 20px 0 20px 30px;">Không tìm thấy tài khoản giảng viên !</p>
            @else
                <table class="table table-striped" style="text-align: center;margin: 0!important;">
                    <thead>
                    <tr>
                        <th>Mã giảng viên</th>
                        <th>Tên giảng viên</th>
                        <th>Hỉnh ảnh</th>
                        <th>Email</th>
                        <th>Xử lý</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--{{$client}}--}}
                    @foreach($admin as $item)
                        <tr>
                            <td>{{$item->number_id}}</td>
                            <td>{{$item->name}}</td>
                            @if(!$item->avatar)
                                <td><img src="/image/user/no_image.png" style="width: 60px;height: 60px;border-radius: 50%"></td>
                            @else
                                <td><img src="/image/user/{{$item->avatar}}" style="width: 60px;height: 60px;border-radius: 50%"></td>
                            @endif
                            <td>{{$item->email}}</td>
                            <td class="control-icon">
                                <a href="{{route('admin.account.info_admin',$item->id)}}"><i class="fas fa-info-circle" title="Xem chi tiết"></i></a>
                                <a href="{{route('admin.account.show_update_admin',$item->id)}}"><i class="fas fa-pen" title="Sửa"></i></a>
                                <a class="delete_account" data-toggle="modal" data-target="#exampleModal{{$item->id}}" data-name="{{$item->name}}" data-id="{{$item->id}}" style="cursor: pointer"><i class="fas fa-trash" title="Xóa"></i></a>
                                {{--@include('modal-confirm', ['item_id' => $item->id])--}}
                                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thông báo </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <span class="alert alert-danger">Bạn có chắc muốn xóa tài khoản quản trị: {{ $item->name }}</span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                                <form method="post" action="{{route('admin.account.delete_admin' , $item->id) }}">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="paginate" style="display: flex;justify-content: center;">{{$admin}}</div>
    </div>
@endsection
@section('script')
    /js/admin/home.js
@endsection


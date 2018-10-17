@extends('admin/layout')
@section('css')
    /css/client/home.css
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
        <ol class="breadcrumb">
            <li>
                <span style="font-size: 16px;">Thông tin sinh viên: <span style="font-size: 20px;margin-left: 20px;text-transform: capitalize">{{$update_client->name}}</span></span>
            </li>
        </ol>

        <div class="card mb-3">
            {{--@php--}}
            {{--dump($errors);--}}
            {{--@endphp--}}
            <div class="card-body">
                <form id="uppdate-user"  action="{{route('admin.account.update_client',$update_client->id)}}" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên đầy đủ</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$update_client->name}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$update_client->email}}">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        @if(!$update_client->address)
                            <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ  ...">
                        @else
                            <input type="text" class="form-control" name="address" id="address" value="{{$update_client->address}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        @if(!$update_client->phone_number)
                            <input type="number" class="form-control" name="phone_number" placeholder="Nhập số điện thoại ..." id="phone-number">
                        @else
                            <input type="number" class="form-control" name="phone_number"  id="phone-number" value="0{{$update_client->phone_number}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Năm sinh</label>
                        <input type="date" class="form-control" name="birthday" id="birthday" value="{{$update_client->birthday}}">
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select class="form-control" id="gender" name="gender">
                            @if($update_client->gender == 1)
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                            @else
                                <option value="2">Nữ</option>
                                <option value="1">Nam</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" class="form-control" name="avatar" id="avatar" value="">
                        @if(!$update_client->avatar)
                            <img src="/image/user/no_image.png" id="image">
                        @else
                            <img src="/image/user/{{$update_client->avatar}}" id="image">
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-3" style="margin: 30px 0;">
                                <input type="submit" name="update-user-button" id="update-user-button"  class="form-control btn btn-success" value="Cập nhật">
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
        @endsection
        @section('script')
            /js/admin/home.js
@endsection


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
        <ol class="breadcrumb">
            <li>
                <span style="font-size: 16px;">Thông tin sinh viên: <span style="font-size: 20px;margin-left: 20px;text-transform: capitalize">{{$info_client->name}}</span></span>
            </li>
        </ol>

        <div class="card mb-3">
            {{--@php--}}
            {{--dump($errors);--}}
            {{--@endphp--}}
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Họ và tên</span>
                <span style="width: 3%;display: inline-block">:</span>
                <span style="width: 80%;display: inline-block">{{$info_client->name}}</span>
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Ảnh đại diện</span>
                <span style="width: 3%;display: inline-block">:</span>
                @if(!$info_client->avatar)
                    <span style="width: 80%;display: inline-block"><img src="/image/user/no_image.png"
                                                                        style="height: 80px ; width: 80px;border-radius: 50%;"></span>
                @else
                <span style="width: 80%;display: inline-block"><img src="/image/user/{{$info_client->avatar}}"
                                                                    style="height: 80px ; width: 80px;border-radius: 50%;"></span>
                    @endif
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Mã sinh viên</span>
                <span style="width: 3%;display: inline-block">:</span>
                <span style="width: 80%;display: inline-block">{{$info_client->number_id}}</span>
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Địa chỉ Email</span>
                <span style="width: 3%;display: inline-block">:</span>
                <span style="width: 80%;display: inline-block">{{$info_client->email}}</span>
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Địa chỉ</span>
                <span style="width: 3%;display: inline-block">:</span>
                @if(!$info_client->address)
                    <i style="width: 80%;display: inline-block;font-size: 12px">Chưa cập nhật</i>
                @else
                <span style="width: 80%;display: inline-block">{{$info_client->address}}</span>
                    @endif
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Số điện thoại</span>
                <span style="width: 3%;display: inline-block">:</span>
                @if(!$info_client->phone_number)
                    <i style="width: 80%;display: inline-block;font-size: 12px;">Chưa cập nhật</i>
                @else
                    <span style="width: 80%;display: inline-block">0{{$info_client->phone_number}}</span>
                @endif
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Giới tính</span>
                <span style="width: 3%;display: inline-block">:</span>
                @if($info_client->gender = 1 )
                <span style="width: 80%;display: inline-block">Nam</span>
                    @else
                    <span style="width: 80%;display: inline-block">Nữ</span>
                    @endif
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Năm sinh</span>
                <span style="width: 3%;display: inline-block">:</span>
                @if(!$info_client->birthday)
                    <i style="width: 80%;display: inline-block;font-size: 12px;">Chưa cập nhật</i>
                @else
                <span style="width: 80%;display: inline-block">{{\Carbon\Carbon::parse($info_client->birthday)->format('d/m/Y')}}</span>
                    @endif
            </div>

    </div>
@endsection
@section('script')
    /js/admin/home.js
@endsection


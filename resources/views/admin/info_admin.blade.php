@extends('admin/layout')
@section('css')
    /css/admin/home.css
@endsection
@section('account-active','active')
@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li>
                <span style="font-size: 16px;">Thông tin sinh viên: <span style="font-size: 20px;margin-left: 20px;text-transform: capitalize">{{$info_admin->name}}</span></span>
            </li>
        </ol>

        <div class="card mb-3">
            {{--@php--}}
            {{--dump($errors);--}}
            {{--@endphp--}}
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Họ và tên</span>
                <span style="width: 3%;display: inline-block">:</span>
                <span style="width: 80%;display: inline-block">{{$info_admin->name}}</span>
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Ảnh đại diện</span>
                <span style="width: 3%;display: inline-block">:</span>
                @if(!$info_admin->avatar)
                    <span style="width: 80%;display: inline-block"><img src="/image/user/no_image.png"
                                                                        style="height: 80px ; width: 80px;border-radius: 50%;"></span>
                @else
                    <span style="width: 80%;display: inline-block"><img src="/image/user/{{$info_admin->avatar}}"
                                                                        style="height: 80px ; width: 80px;border-radius: 50%;"></span>
                @endif
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Mã sinh viên</span>
                <span style="width: 3%;display: inline-block">:</span>
                <span style="width: 80%;display: inline-block">{{$info_admin->number_id}}</span>
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Địa chỉ Email</span>
                <span style="width: 3%;display: inline-block">:</span>
                <span style="width: 80%;display: inline-block">{{$info_admin->email}}</span>
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Địa chỉ</span>
                <span style="width: 3%;display: inline-block">:</span>
                @if(!$info_admin->address)
                    <i style="width: 80%;display: inline-block;font-size: 12px">Chưa cập nhật</i>
                @else
                    <span style="width: 80%;display: inline-block">{{$info_admin->address}}</span>
                @endif
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Số điện thoại</span>
                <span style="width: 3%;display: inline-block">:</span>
                @if(!$info_admin->phone_number)
                    <i style="width: 80%;display: inline-block;font-size: 12px;">Chưa cập nhật</i>
                @else
                    <span style="width: 80%;display: inline-block">0{{$info_admin->phone_number}}</span>
                @endif
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Giới tính</span>
                <span style="width: 3%;display: inline-block">:</span>
                @if($info_admin->gender = 1 )
                    <span style="width: 80%;display: inline-block">Nam</span>
                @else
                    <span style="width: 80%;display: inline-block">Nữ</span>
                @endif
            </div>
            <div class="info" style="margin:20px 0 20px 20px;">
                <span style="width: 10%;display: inline-block">Năm sinh</span>
                <span style="width: 3%;display: inline-block">:</span>
                @if(!$info_admin->birthday)
                    <i style="width: 80%;display: inline-block;font-size: 12px;">Chưa cập nhật</i>
                @else
                    <span style="width: 80%;display: inline-block">{{\Carbon\Carbon::parse($info_admin->birthday)->format('d/m/Y')}}</span>
                @endif
            </div>

        </div>
        @endsection
        @section('script')
            /js/admin/home.js
@endsection


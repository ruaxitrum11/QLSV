@extends('client/layout')
@section('css')
    /css/client/home.css
@endsection
@section('info-active','active')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                Thông tin sinh viên
            </li>
        </ol>
        <ul class="user_information">
            <li>
                <label>Tên sinh viên</label>
                <i>:</i>
                <span>{{Auth::user()->name}}</span>
            </li>
            <li>
                <label>Mã sinh viên</label>
                <i>:</i>
                <span>{{Auth::user()->number_id}}</span>
            </li>
            <li>
                <label>Email</label>
                <i>:</i>
                <span>{{Auth::user()->email}}</span>
            </li>
            <li>
                <label>Số điện thoại</label>
                <i>:</i>
                @if(!Auth::user()->phone_number)
                    <span style="font-size: 12px;font-style: italic">Chưa cập nhật</span>
                    @else  <span>0{{Auth::user()->phone_number}}</span>
                @endif
            </li>
            <li>
                <label>Địa chỉ</label>
                <i>:</i>
                @if(!Auth::user()->address)
                    <span style="font-size: 12px;font-style: italic">Chưa cập nhật</span>
                @else  <span>{{Auth::user()->address}}</span>
                @endif
            </li>
            <li>
                <label>Giới tính</label>
                <i>:</i>
                @if(Auth::user()->gender == 1)
                <span>Nam</span>
                    @else Nữ
                @endif
            </li>
            @if(!Auth::user()->subjects->isEmpty())
            @foreach(Auth::user()->subjects as $data)
                <li>
                    <label>Điểm {{$data->name}}</label>
                    <i>:</i>
                    <span>{{$data->pivot->score}}</span>
                </li>
            @endforeach
            @else
                @foreach($subject as $data)
                    <li>
                        <label>Điểm {{$data->name}}</label>
                        <i>:</i>
                        <span></span>
                    </li>
                @endforeach
            @endif
            <li>
                @php
                if(!Auth::user()->subjects->isEmpty()){
                $total = 0 ;
                foreach (Auth::user()->subjects as $data){
                    $total += $data->pivot->score;
                }
                $gpa = round($total / count(Auth::user()->subjects),2);
                }else {
                $gpa = '';
                }
                @endphp
                <label>Điểm trung bình</label>
                <i>:</i>
                <span>{{$gpa}}</span>
            </li>
            <li>
                <label>Xếp loại</label>
                <i>:</i>
                <span>{{Auth::user()->rank}}</span>
            </li>
        </ul>

    </div>
@endsection
@section('script')
    /js/client/home.js
@endsection


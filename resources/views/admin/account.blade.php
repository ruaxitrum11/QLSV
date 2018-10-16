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
            <li style="width: 50%;text-align: center;padding: 20px 0;background: #ddd!important;">
                <a href="#" style="font-size: 16px;">Danh sách tài khoản sinh viên</a>
            </li>
            <li style="width: 50%;text-align: center;padding: 20px 0">
                <a href="#" style="font-size: 16px;">Danh sách tài khoản giảng viên</a>
            </li>
        </ol>

        <div class="card mb-3">
            {{--@php--}}
            {{--dump($errors);--}}
            {{--@endphp--}}
            @if(!$client)
               <p style="margin: 20px 0 20px 30px;">Danh sách tài khoản trống !</p>
                @else
                <table class="table table-striped" style="text-align: center;margin: 0!important;">
                    <thead>
                    <tr>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Hỉnh ảnh</th>
                        <th>Email</th>
                        <th>Xử lý</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--{{$client}}--}}
                    @foreach($client as $item)
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
                                <a href=""><i class="fas fa-info-circle" title="Xem chi tiết"></i></a>
                                <a href=""><i class="fas fa-pen" title="Sửa"></i></a>
                                <a href=""><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
        </div>
        <div class="paginate" style="display: flex;justify-content: center;">{{$client}}</div>
    </div>
@endsection
@section('script')
    /js/client/home.js
@endsection


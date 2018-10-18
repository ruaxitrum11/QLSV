@extends('admin/layout')
@section('css')
    /css/admin/home.css
@endsection
@section('score-active','active')
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
                <a href="#">Quản lý điểm sinh viên</a>
            </li>
        </ol>

        <div class="card mb-3">
            {{--@php--}}
            {{--dump($errors);--}}
            {{--@endphp--}}
            <div class="card-body">
                <table class="table" style="text-align: center">
                    <thead>
                    <tr>
                        <th>Tên sinh viên</th>
                        @foreach($subject as $data)
                        <th>Môn {{$data->name}}</th>
                        @endforeach
                        <th>Điểm trung bình</th>
                        <th>Xếp loại</th>
                        <th>Xử lý</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        @foreach($subject as $data)
                            <td>{{$data->id}}</td>
                        @endforeach
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{route('admin.score.showUpdate',$item->id)}}"><i class="fas fa-pen" title="Sửa"></i></a>
                        </td>
                    </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        @endsection
        @section('script')
            /js/admin/home.js
@endsection


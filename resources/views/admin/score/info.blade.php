{{--@php--}}

{{--foreach($user as $item) {--}}
{{--$subject = $item->subjects;--}}
{{--}--}}

{{--@endphp--}}

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
            <button style="top: -55px!important;right: -28px!important;" type="button" class="close"
                    data-dismiss="alert" aria-label="Close">
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
        <form action="{{ route('admin.score.info') }}" method="get" role="form">
            {{csrf_field()}}
            <div class="search-data" style="margin: 20px 0;">
                <input name="search" type="text" placeholder="Nhập Mã hoặc Tên sinh viên" style="width: 30%">
                <select name="rank" style="padding: 10px 0">
                    <option>Xếp loại</option>
                    <option name="rank" value="Giỏi">Giỏi</option>
                    <option name="rank" value="Khá">Khá</option>
                    <option name="rank" value="Trung Bình">Trung Bình</option>
                </select>
                <button style="cursor: pointer;margin-left: 10px;" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div class="card mb-3">
            {{--@php--}}
            {{--dump($errors);--}}
            {{--@endphp--}}
            <div class="card-body">
                <table class="table" style="text-align: center">
                    @if($user->isEmpty())
                        Không tìm thấy !
                    @else
                        <thead>
                        <tr>
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                            {{--@php dd($subject[0])  @endphp--}}
                            @foreach($subjects as $data)
                                {{--@php dd($data[0]->name)  @endphp--}}
                                <th>Môn {{$data->name}}</th>
                            @endforeach
                            <th>Điểm trung bình</th>
                            <th>Xếp loại</th>
                            <th>Xử lý</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($user as $item)
                            @php
                                $subject = $item->subjects;
                                if(!$subject->isEmpty()){
                                  $total = 0 ;
                                foreach ($subject as $data) {
                                    $total += $data->pivot->score;
                                }
                                $gpa = round($total/count($subject),2);
                                }else {
                                $gpa = '';
                                }
                            @endphp

                            <tr>
                                <td>{{$item->number_id}}</td>
                                <td>{{$item->name}}</td>
                                @if(!$subject->isEmpty())
                                @foreach($subject as $data)
                                    <td>{{$data->pivot->score}}</td>
                                @endforeach
                                @else
                                    @foreach($subjects as $data)
                                        <td></td>
                                        @endforeach
                                @endif


                                <td>{{$gpa}}</td>
                                <td>{{$item->rank}}</td>
                                <td>
                                    <a href="{{route('admin.score.showUpdate',$item->id)}}"><i class="fas fa-pen"
                                                                                               title="Sửa"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                </table>
                <div class="paginate" style="display: flex;justify-content: center;">{{$user}}</div>
            </div>

        </div>
        @endsection
        @section('script')
            /js/admin/home.js
@endsection


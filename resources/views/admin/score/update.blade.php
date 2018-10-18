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
                <a href="#">Cập nhật điểm sinh viên: {{$user->name}}</a>
            </li>
        </ol>

        <div class="card mb-3">
            {{--@php--}}
            {{--dump($errors);--}}
            {{--@endphp--}}
            <div class="card-body">
                <form action="{{route('admin.score.update',$user->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                <table class="table" style="text-align: center">
                    <thead>
                    <tr>
                        @foreach($subject as $data)
                        <th>Môn {{$data->name}}</th>
                            @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($subject as $data)
                            <div class="form-group">
                            <td><input name="score[]" min="0" max="10" type="number" style="text-align: center;border:none;outline: none;font-size: 20px;width: 100%;" value="{{$data->pivot->score}}"></td>
                                <input hidden name="subject[]" value="{{$data->id}}" type="number" style="text-align: center;border:none;outline: none;font-size: 20px;width: 100%;">

                            </div>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>

        </div>
        @endsection
        @section('script')
            /js/admin/home.js
@endsection


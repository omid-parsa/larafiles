@extends('layouts.frontend')
@section('content')
    <div class="col-xs-9 col-md-9">
        <div class="card mb-2">
            <div class="card-header">
                File Details
            </div>

                <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <p>Title: {{$file_item->file_title}}</p>
                            <p>Description: {{$file_item->file_description}}</p>
                            <p>Type: {{$file_item->file_type_text}}</p>
                        </li>

                </ul>

        </div>
    </div>
    <div class="col-xs-3 col-md-3">
        <div class="card mb-2">
            <div class="card-header">
                Buy
            </div>
                <div class="pt-2 pb-2 pl-3 pr-3 ">
                    @if(\App\Utility\User::is_user_subscibed($user_id))

                        <a class="btn btn-primary btn-block" href="{{route('frontend.files.download', $file_item->file_id)}}">Download File</a>
                        <a data-fid="{{$file_item->file_id}}"  class="btn btn-warning btn-block btn_report_file">Report damaged Link</a>
                    @else
                        <a href="{{route('frontend.plans.index')}}" class="btn btn-success btn-block">Buy This File</a>
                    @endif
                </div>
        </div>

    </div>
@endsection
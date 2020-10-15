@extends('layouts.frontend')
@section('content')
    <div class="col-xs-9 col-md-9">
        <div class="card mb-2">
            <div class="card-header">
                Files List
            </div>
            @if($files && count($files)>0)
                <ul class="list-group list-group-flush">
                    @foreach($files as $file)
                        <li class="list-group-item"><a
                                    href="{{route('frontend.files.details', $file->file_id)}}">{{$file->file_title}}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="card mb-2">
            <div class="card-header">
                Packages List
            </div>
            @if($packages && count($packages)>0)
                <ul class="list-group list-group-flush">
                    @foreach($packages as $package)
                        <li class="list-group-item"><a
                                    href="{{route('frontend.packages.details', $package->package_id)}}">{{$package->package_title}}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-xs-3 col-md-3">

        </div>
@endsection
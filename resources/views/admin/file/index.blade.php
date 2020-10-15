@extends('layouts.admin')
@section('content')
    @if($files && count($files)>0)
        <table class="table table-striped bg-white">
            <thead>
                @include('admin.file.columns')
            </thead>
            <tbody>
                @foreach($files as $file)
                    @include('admin.file.item', $file)
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
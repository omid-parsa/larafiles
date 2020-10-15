@extends('layouts.admin')
@section('content')
    @include('admin.partials.notifications')
    @if($packages && count($packages)>0)
        <table class="table table-striped bg-white">
            <thead>
                @include('admin.package.columns')
            </thead>
            <tbody>
                @foreach($packages as $package)
                    @include('admin.package.item', $package)
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
@extends('layouts.admin')
@section('content')
    @include('admin.partials.notifications')
    @if($categories && count($categories)>0)
        <table class="table table-hover bg-white">
            <thead>
                @include('admin.category.columns')
            </thead>
            <tbody>
                @foreach($categories as $category)
                    @include('admin.category.item', $category)
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
@extends('layouts.admin')
@section('content')
    @include('admin.partials.notifications')
    @if($plans && count($plans)>0)
        <table class="table table-striped bg-white">
            <thead>
                @include('admin.plan.columns')
            </thead>
            <tbody>
                @foreach($plans as $plan)
                    @include('admin.plan.item', $plan)
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
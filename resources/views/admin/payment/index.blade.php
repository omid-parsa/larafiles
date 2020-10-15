@extends('layouts.admin')
@section('content')
    @include('admin.partials.notifications')
    <table class="table table-striped bg-white">
        <thead>
            @include('admin.payment.columns')
        </thead>
        @if($payments && count($payments)>0)


            <tbody>
                @foreach($payments as $payment)
                    @include('admin.payment.item', $payment)
                    @endforeach
            </tbody>

        @endif
    </table>
@endsection
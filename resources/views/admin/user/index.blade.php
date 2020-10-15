@extends('layouts.admin')
@section('content')
    @include('admin.partials.notifications')

    @if($users && count($users)>0)
        <table class="table table-striped bg-white">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Wallet</th>
                <th scope="col">Packages</th>
                <th scope="col">Operations</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @include('admin.user.item', $user)
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
@extends('layouts.admin')
@section('content')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Package Title</th>
                <th>Amount</th>
                <th>Paid at</th>
            </tr>
        </thead>
        <tbody>
            @if($user_packages && count($user_packages)>0)
                @foreach($user_packages as $package)
                    <tr>
                        <td>{{$package->package_title}}</td> {{-- $package->package_title | this value is from package table--}}
                        <td>{{$package->pivot->amount}}</td> {{-- $package->->pivot->amount | this value is from user_packages table--}}
                        <td>{{$package->pivot->created_at}}</td> {{-- $package->pivot->created_at | this value is from user_packages table--}}
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">
                        <span>There is no data to display!</span>
                    </td>
                </tr>
            @endif


        </tbody>
    </table>

@endsection
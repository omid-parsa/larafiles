@extends('layouts.frontend')
@section('content')
    <div class="col-xs-12 col-md-12">
        <div class="card mb-2">
            <div class="card-header">
                Select Plans
            </div>
            <div>
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Valid Days</th>
                        <th>Daily Download Limitation</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    @if($plans && count($plans)>0)
                        <tbody>
                            @foreach($plans as $plan)
                                <tr>
                                    <td>{{$plan->plan_title}}</td>
                                    <td>{{$plan->plan_price}}</td>
                                    <td>{{$plan->plan_days_count}}</td>
                                    <td>{{$plan->plan_limit_download_count}}</td>
                                    <td><a href="{{route('frontend.subscribe.index', $plan->plan_id)}}" class="btn btn-success">Buy</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif

                </table>
            </div>
        </div>
    </div>
@endsection
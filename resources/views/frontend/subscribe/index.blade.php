@extends('layouts.frontend')
@section('content')
    <div class="col-xs-12 col-md-12">
        <div class="card mb-2">
            <div class="card-header">
                Buy Download Plan
            </div>
            <div>
                <div class="alert alert-info">
                    Plan Details
                </div>
                <table class="table table-bordered table-condensed">
                    <tr>
                        <td>Title</td>
                        <td>{{$plan->plan_title}}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>{{number_format($plan->plan_price)}}</td>
                    </tr>
                    <tr>
                        <td>Valid Days</td>
                        <td>{{$plan->plan_days_count}}</td>
                    </tr>
                    <tr>
                        <td>Daily Download Limitation</td>
                        <td>{{$plan->plan_limit_download_count}}</td>
                    </tr>
                </table>
                <form action="" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="hidden" name="plan_id" value="{{$plan->plan_id}}">
                        <button class="btn btn-success">Buy This Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.frontend')
@section('content')
    <div class="col-xs-12 col-md-8">
        <div class="card mb-2 p-2">
            <div class="card-header">
                Login
            </div>
            <div class="container">
                @if(session('loginerror'))
                    <div class="alert alert-danger"><p>Email or Password is not correct</p></div>
                @endif
                <form method="post" action="">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="password" >
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
@endsection
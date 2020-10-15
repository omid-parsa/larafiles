@extends('layouts.frontend')
@section('content')
    <div class="col-xs-12 col-md-8 p-2">
        <div class="card mb-2">
            <div class="card-header">
                Login
            </div>
            <div class="container">
                @if(session('registererror'))
                    <div class="alert alert-danger"><p>Email or Password is not correct</p></div>
                @endif
                <form method="post" action="">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="password" >
                    </div>

                    <button type="submit" class="btn btn-success">Sign up</button>
                </form>
            </div>
        </div>
    </div>
@endsection
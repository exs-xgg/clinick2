@extends('includes.template')
@section('content')

<div class="container">

    <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <form class="form-signin" action="/login" method="post">
                    @csrf
                    <label for="inputEmail" class="sr-only">Username</label>
                    <input type="text" id="inputEmail" class="form-control mb-3" placeholder="Username" required autofocus name="email">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required name="password">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                  </form>
            </div>
        </div>
    </div>
</div>


@stop

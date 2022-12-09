@extends('layouts.mainlayout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>
            <form action="/login" method="post">
                @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control" required autofocus value="{{old ('name')}}" id="floatingInput">
                <label for="email">Full Name</label>
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control" required autofocus value="{{old ('email')}}" id="floatingInput" placeholder="name@example.com">
                <label for="email">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="password">Password</label>
              </div>
              <div class="form-floating">
                <input type="password" name="repassword" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="repassword">Confirm Password</label>
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Already have an account? <a href="/login">Login</a></small>
        </main>
    </div>
</div>
@endsection

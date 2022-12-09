@extends('layouts.mainlayout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
            <form action="/login" method="post">
                @csrf
              <div class="form-floating">
                <input type="email" name="email" class="form-control" required autofocus value="{{old ('email')}}" id="floatingInput" placeholder="name@example.com">
                <label for="email">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="password">Password</label>
              </div>

              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now</a></small>
        </main>
    </div>
</div>
@endsection

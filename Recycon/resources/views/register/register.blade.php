@extends('layouts.mainlayout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>
            <form action="/register" method="post">
                @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name')
                    is-invalid
                @enderror" required autofocus value="{{old ('name')}}" id="floatingInput">
                <label for="email">Full Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email')
                    is-invalid
                @enderror" required  value="{{old ('email')}}" id="floatingInput" placeholder="name@example.com">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" required class="form-control @error('password')
                    is-invalid
                @enderror" id="floatingPassword" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="repassword" class="form-control @error('repassword')
                    is-invalid
                @enderror" id="floatingPassword" placeholder="Password">
                <label for="repassword">Confirm Password</label>
                @error('repassword')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already have an account? <a href="/login">Login</a></small>
        </main>
    </div>
</div>
@endsection

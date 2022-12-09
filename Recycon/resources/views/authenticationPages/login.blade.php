@extends('layouts.mainlayout')

@section('content')
<div class="flex justify-center items-center min-h-full w-full mt-24">
    <form action="/login" method="post" class="flex flex-col w-1/4 space-y-4">
        <h1 class="text-sky-900 text-xl">Please Sign In</h1>
        @csrf
        <input class="border p-4" type="email" name="email" required autofocus value="{{old ('email')}}" id="floatingInput" placeholder="Email">
        <input class="border p-4" type="password" name="password" id="floatingPassword" placeholder="Password">
        <label><input type="checkbox" value="remember-me"> Remember me</label>
        <button class="w-24 bg-yellow-300 rounded-md py-2 self-end hover:font-bold" type="submit">Login</button>
    </form>
</div>
@endsection

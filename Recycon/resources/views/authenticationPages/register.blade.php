@extends('layouts.mainlayout')

@section('content')
<div class="flex justify-center items-center min-h-full w-full mt-24">
    <form action="/login" method="post" class="flex flex-col w-2/4 space-y-4">
        <h1 class="text-sky-900 text-xl">Register</h1>
        @csrf
        <input class="border p-4" type="text" name="name" required autofocus value="{{old ('name')}}" id="floatingInput" placeholder="Full Name">
        <input class="border p-4" type="email" name="email" required autofocus value="{{old ('email')}}" id="floatingInput" placeholder="Email">
        <input class="border p-4" type="password" name="password" id="floatingPassword" placeholder="Password">
        <input class="border p-4" type="password" name="repassword" id="floatingPassword" placeholder="Re-enter password">
        <button class="bg-yellow-300 rounded-md py-2 px-4 self-end hover:font-bold" type="submit">Register Now</button>
    </form>
</div>
@endsection

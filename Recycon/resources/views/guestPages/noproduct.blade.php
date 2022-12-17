@extends('layouts.mainlayout')

@section('content')
    <div class="flex flex-col my-8">
        <h1 class="text-center text-sky-900 text-4xl font-normal">Our Products</h1>
        <h2 class="font-normal text-lg mt-60 place-self-center">We are sorry, no such product with those keywords.</h2>
        <a class="w-36 rounded-md p-2 bg-yellow-400 font-semibold text-center place-self-center my-4" href="{{ route('showproduct') }}">Click to go back</a>
    </div>
@endsection

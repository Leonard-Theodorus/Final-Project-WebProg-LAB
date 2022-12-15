@extends('layouts.mainlayout')

@section('content')
    <div class="w-1/3 mx-8 shadow-sm border border-yellow-400 rounded-md mt-4">
        <img class="w-full h-80" src="{{$product->product_img}}" class=" bg-cover" alt="" width="400px" height="150px">
        <div class="flex flex-col p-4">
            <div class="flex justify-between">
                <h5 class="text-xl font-semibold">{{$product->product_name}}</h5>
                <h5 class="text-md text-gray-500">{{$product->category}}</h5>
            </div>
            <h5 class="text-md mb-4 text-gray-500">IDR. {{ $product->price }}</h5>
            <h5 class="text-md">{{$product->description}}</h5>
            @auth
                {{-- nanti dimasukin UI buat customer select quantity sama buy yang ke direct ke cart --}}
                <form class="w-full flex mt-2 space-evenly">
                    <div class="flex flex-col">
                        <label class="mb-2 font-semibold" for="quantity">Quantity:</label>
                        <input class="w-16 border border-slate-500 rounded-md p-2" type="number" id="quantity" name="quantity" value="1" min="1" max="100">
                    </div>
                    <button type="submit" class="ml-8 w-36 h-fit place-self-end rounded-md p-2 bg-yellow-400 font-semibold text-center">Add to cart</button>
                </form>
                @else
                <a href="/login" class="mt-8 w-36 rounded-md p-2 bg-yellow-400 font-semibold text-center">Login to buy</a>
            @endauth
        </div>
    </div>

@endsection

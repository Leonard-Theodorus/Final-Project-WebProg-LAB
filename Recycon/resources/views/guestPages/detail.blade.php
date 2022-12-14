@extends('layouts.mainlayout')

@section('content')
    <div class="w-1/4 mx-8 shadow-sm border border-yellow-400 rounded-md">
        {{-- size imagenya perlu disesuain lagi --}}
        <img src="{{$product->product_img}}" class=" bg-cover" alt="" width="400px" height="150px">
        <div class="flex flex-col p-4">
            <div class="flex justify-between">
                <h5 class="text-xl">{{$product->product_name}}</h5>
                <h5 class="text-md   text-gray-500">{{$product->category}}</h5>
            </div>
            {{-- //Harganya belum disesuain sama harga barangnya beneran --}}
            <h5 class="text-md mb-4 text-gray-500">IDR. {{ $product->price }}</h5>
            <h5 class="text-xl">{{$product->description}}</h5>
            @auth
                {{-- nanti dimasukin UI buat customer select quantity sama buy yang ke direct ke cart --}}
                @else
                <a href="/login" class="w-36 rounded-md p-2 bg-yellow-400 font-semibold text-center">Login to buy</a>
            @endauth
        </div>
    </div>

@endsection

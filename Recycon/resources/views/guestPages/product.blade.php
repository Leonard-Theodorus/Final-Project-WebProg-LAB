@extends('layouts.mainlayout')

@section('content')
<div class="flex flex-col my-8">
    <h1 class="text-center text-sky-900 text-4xl font-normal">Our Products</h1>
    <div class="px-12 flex flex-wrap w-full justify-evenly mt-12">
    @foreach ($products as $product)
    {{-- Default pagination. --}}
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
                <form action={{route('detail', ['item_id' => $product->item_id])}} method="post">
                    @csrf
                    <button type="submit" class="w-36 rounded-md p-2 bg-yellow-400 font-semibold text-center">Detail Product</button>
                </form>
            </div>
        </div>
        @endforeach
        {{$products->links()}}
    {{-- Pagination masih default --}}
</div>

@endsection

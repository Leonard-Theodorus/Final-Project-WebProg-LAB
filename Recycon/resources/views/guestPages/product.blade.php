@extends('layouts.mainlayout')

@section('content')
<div class="flex flex-col my-8">
    <h1 class="text-center text-sky-900 text-4xl font-normal">Our Products</h1>
    <div class="px-12 flex flex-wrap w-full justify-evenly mt-12">
    {{-- @foreach ($category->products as $product) --}}
    {{-- NOTE: Beberapa variable diubah, ini belum paginations. --}}
        <div class="w-1/4 mx-8 shadow-sm border border-yellow-400 rounded-md">
            <img src="https://i0.wp.com/kayu-seru.com/wp-content/uploads/2020/10/Meja-Belajar-Kayu.jpg?fit=600%2C600&ssl=1" class=" bg-cover" alt="" width="400px" height="150px">
            <div class="flex flex-col p-4">
                <div class="flex justify-between">
                    <h5 class="text-xl">Paper Craft</h5>
                    <h5 class="text-md   text-gray-500">Recycle</h5>
                </div>
                <h5 class="text-md mb-4 text-gray-500">IDR. 20.000</h5>
                <a href="" class="w-36 rounded-md p-2 bg-yellow-400 font-semibold text-center">Detail Product</a>
            </div>
        </div>
    {{-- @endforeach --}}
    {{-- Pagination --}}
</div>

@endsection
@extends('layouts.mainlayout')

@section('content')
<div class="flex px-32 mt-4">
    <h1 class="text-sky-900 text-2xl text-start">Manage Item</h1>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show text-green-500" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
<div class="px-32 py-4 w-full">
    <div class="overflow-hidden rounded-md mb-32">
        <table class="min-w-full bg-white border-2 border-sky-900">
            <thead>
                {{-- bisa buat setiap ganjil/genap trnya kasih bg-yellow-100 atau bg-orange-100 ga? --}}
                <tr class="font-bold text-md text-left bg-yellow-100 ">
                    <th class="p-2 border-r border-r-sky-900 border-b border-b-sky-900">No</th>
                    <th class="p-2 border-r border-r-sky-900 border-b border-b-sky-900">Item Id</th>
                    <th class="p-2 border-r border-r-sky-900 border-b border-b-sky-900">Item Image</th>
                    <th class="p-2 border-r border-r-sky-900 border-b border-b-sky-900">Item Name</th>
                    <th class="p-2 border-r border-r-sky-900 border-b border-b-sky-900">Item Description</th>
                    <th class="p-2 border-r border-r-sky-900 border-b border-b-sky-900">Item Price</th>
                    <th class="p-2 border-r border-r-sky-900 border-b border-b-sky-900">Item Category</th>
                    <th class="p-2 border-b border-b-sky-900">Action</th>
                </tr>
            </thead>
            <tbody class="bg-yellow-100">
                @foreach ($products as $product )
                @if ($loop->iteration % 2 != 0)
                    <tr class="border-b border-b-sky-900 bg-orange-100">
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">{{$loop->iteration}}</td>
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">{{$product->item_id}}</td>
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">
                            @if (str_starts_with($product->product_img , 'https'))
                                <img style="width: 150px; height: 100px" src= {{$product->product_img}} alt="">
                                <img src="" alt="">
                            @else
                                <img style="width: 150px; height: 100px" src= {{asset('storage/'. $product->product_img)}} alt="">
                            @endif
                        </td>
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">{{$product->product_name}}</td>
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">{{$product->description}}</td>
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">{{$product->price}}</td>
                        <td class="text-left py-3 border-r border-r-sky-900 px-4">{{$product->category}}</td>
                        <td class="text-left py-3 px-4 flex space-x-4">
                            <form action={{route('updateitem', ['product_update_id' => $product->item_id])}} method="GET">
                                @csrf
                                <button class="w-24 bg-yellow-300 rounded-md py-2 self-end hover:font-bold" type="submit">Update</button>
                            </form>
                            <form action={{route('viewitem',['product_delete' => $product->id] )}} method="post">
                                @csrf
                                <button class="w-24 bg-red-500 rounded-md py-2 self-end hover:font-bold" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @else
                    <tr class="border-b border-b-sky-900 bg-yellow-100">
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">{{$loop->iteration}}</td>
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">{{$product->item_id}}</td>
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">
                            @if (str_starts_with($product->product_img , 'https'))
                                <img style="width: 150px; height: 100px" src= {{$product->product_img}} alt="">
                                <img src="" alt="">
                            @else
                                <img style="width: 150px; height: 100px" src= {{asset('storage/'. $product->product_img)}} alt="">
                            @endif
                        </td>
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">{{$product->product_name}}</td>
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">{{$product->description}}</td>
                        <td class="text-left py-3 px-4 border-r border-r-sky-900">{{$product->price}}</td>
                        <td class="text-left py-3 border-r border-r-sky-900 px-4">{{$product->category}}</td>
                        <td class="text-left py-3 px-4 flex space-x-4">
                            <form action={{route('updateitem', ['product_update_id' => $product->item_id])}} method="GET">
                                @csrf
                                <button class="w-24 bg-yellow-300 rounded-md py-2 self-end hover:font-bold" type="submit">Update</button>
                            </form>
                            <form action={{route('viewitem',['product_delete' => $product->id] )}} method="post">
                                @csrf
                                <button class="w-24 bg-red-500 rounded-md py-2 self-end hover:font-bold" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

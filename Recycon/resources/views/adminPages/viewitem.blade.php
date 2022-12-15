@extends('layouts.mainlayout')

@section('content')
<div class="flex justify-center items-center h-96">
    <h1 class="text-sky-900 text-xl">Manage Item</h1>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{-- warna text buat message success jadiin hijau --}}
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
<div class="md:px-32 py-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
      <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No.</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Item ID</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Item Image</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Item Name</td>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Item Description</td>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Item Price</td>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Item Category</td>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Item Action</td>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          @foreach ($products as $product )
            <tr>
                <td class="text-left py-3 px-4">{{$product->id}}</td>
                <td class="text-left py-3 px-4">{{$product->item_id}}</td>
                <td class="text-left py-3 px-4">
                  @if (str_starts_with($product->product_img , 'https'))
                  <img style="width: 200px; height: 200px" src= {{$product->product_img}} alt="">
                  @else
                  <img style="width: 200px; height: 200px" src= {{asset('storage/'. $product->product_img)}} alt="">
                  @endif
                </td>
                <td class="text-left py-3 px-4">{{$product->product_name}}</td>
                <td class="text-left py-3 px-4">{{$product->description}}</td>
                <td class="text-left py-3 px-4">{{$product->price}}</td>
                <td class="text-left py-3 px-4">{{$product->category}}</td>
                <form action={{route('updateitem', ['product_update_id' => $product->item_id])}} method="GET">
                    @csrf
                    <td class="text-left py-3 px-4"><button class="w-24 bg-yellow-300 rounded-md py-2 self-end hover:font-bold" type="submit">Update</button></td>
                </form>
                <form action={{route('viewitem',['product_delete' => $product->id] )}} method="post">
                    @csrf
                    <td class="text-left py-3 px-4"><button class="w-24 bg-red-500 rounded-md py-2 self-end hover:font-bold" type="submit">Delete</button></td>
                </form>
            </tr>
          @endforeach
      </tbody>
      </table>
    </div>
</div>

@endsection

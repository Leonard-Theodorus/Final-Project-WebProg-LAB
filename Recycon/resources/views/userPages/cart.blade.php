@extends('layouts.mainlayout')

@section('content')
    <div style="min-height: 75vh" class="flex flex-col px-32 my-8">
        <h1 class="font-semibold text-2xl mb-4">My Cart</h1>

        {{-- IF [ADA BARANG] --}}
        <table class="table-fixed mb-4">
            <thead>
                {{-- bisa buat setiap ganjil/genap trnya kasih bg-yellow-100 atau bg-orange-100 ga? --}}
                <tr class="font-bold text-md bg-yellow-100 text-left border border-sky-900">
                    <th class="p-2 border-r border-r-sky-900">No</th>
                    <th class="p-2 border-r border-r-sky-900">Item Image</th>
                    <th class="p-2 border-r border-r-sky-900">Item Name</th>
                    <th class="p-2 border-r border-r-sky-900">Item Price</th>
                    <th class="p-2 border-r border-r-sky-900">Quantity</th>
                    <th class="p-2 border-r border-r-sky-900">Total Price</th>
                    <th class="p-2 ">Action</th>
                </tr>
            </thead>
            <tbody class="">
                {{-- @foreach ($collection as $item) --}}
                    {{-- <tr class="text-md bg-orange-100 text-left border border-sky-900">
                        <th class="p-2 border-r border-r-sky-900 font-normal text-md">1.</th>
                        <th class="p-2 border-r border-r-sky-900 font-normal text-md"><img src="" alt="" width="100px" height="50"></th>
                        <th class="p-2 border-r border-r-sky-900 font-normal text-md">Nama Barang</th>
                        <th class="p-2 border-r border-r-sky-900 font-normal text-md">IDR. </th>
                        <th class="p-2 border-r border-r-sky-900 font-normal text-md">1 </th>
                        <th class="p-2 border-r border-r-sky-900 font-normal text-md">IDR. </th>
                        <th class="p-2 flex space-x-2">
                            <form action="post"><button class="text-md hover:shadow-lg p-2 bg-yellow-300 rounded-md">Update</button></form>
                            <form action="post"><button class="text-md hover:shadow-lg p-2 bg-red-500 rounded-md text-white">Delete</button></form>
                        </th>
                    </tr> --}}
                {{-- @endforeach --}}
            </tbody>
        </table>
        <h3 class="text-md font-bold mb-4">Grand Total: <span>IDR. 70.000</span></h3>
        
        <h1 class="text-sky-700 text-2xl mb-4">Receiver</h1>
        <form action="" class="flex flex-col space-y-4">
            <input type="text" placeholder="Receiver Name" class="border border-sky-900 p-2 rounded-md">
            <textarea name="" id="" cols="15" rows="5" placeholder="Receiver Address" class="border border-sky-900 p-2 rounded-md"></textarea>
            <button class="w-32 rounded-md p-2 rounded-md hover:font-bold bg-yellow-400 p-2" type="submit">Checkout (2)</button>
        </form>

        {{-- ELSE [GA ADA BARANG] --}}
        {{-- <h2 class="font-normal text-lg mt-60 place-self-center">Cart is empty!, Let's go shopping :)</h2> --}}
    </div>
@endsection

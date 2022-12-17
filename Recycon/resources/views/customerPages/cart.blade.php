@extends('layouts.mainlayout')

@section('content')
    <div style="min-height: 75vh" class="flex flex-col px-32 my-8">
        @if(session()->has('update_cart_success'))
            <div class="alert alert-success alert-dismissible fade show text-green-500" role="alert">
                {{session('update_cart_success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('delete_success'))
            <div class="alert alert-success alert-dismissible fade show text-green-500" role="alert">
                {{session('delete_success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="font-semibold text-2xl mb-4">My Cart</h1>

    @if (!$empty)
        <table class="table-fixed mb-4">
            <thead>
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
                @php
                    $grand_total = 0;
                    $items = $cart_items;
                @endphp
                @foreach ($cart_items as $cart_item)
                    @if ($loop->iteration % 2 != 0)
                        <tr class="text-md bg-orange-100 text-left border border-sky-900">
                                <th class="p-2 border-r border-r-sky-900 font-normal text-md">{{ $loop->iteration }}</th>
                                @if (str_starts_with($cart_item->product_img, 'https'))
                                    <th class="p-2 border-r border-r-sky-900 font-normal text-md"><img
                                            src="{{ $cart_item->product_img }}" alt="product Image" width="100px"
                                            height="50px"></th>
                                @else
                                    <th class="p-2 border-r border-r-sky-900 font-normal text-md"><img
                                            src="{{ asset('storage/' . $cart_item->product_img) }}}" alt="product Image"
                                            width="100px" height="50px"></th>
                                @endif
                                <th class="p-2 border-r border-r-sky-900 font-normal text-md"> {{ $cart_item->product_name }}
                                </th>
                                <th class="p-2 border-r border-r-sky-900 font-normal text-md"> IDR. {{ $cart_item->price }}
                                </th>
                                <th class="p-2 border-r border-r-sky-900 font-normal text-md">{{ $cart_item->quantity }}</th>
                                @php
                                    $qty = $cart_item->quantity;
                                    $total = $cart_item->quantity * $cart_item->price;
                                @endphp
                                <th class="p-2 border-r border-r-sky-900 font-normal text-md"> IDR. {{ $total }}</th>
                                <th class="p-2 flex space-x-2">
                                    <form action={{route('updatecart', ['item_id' => $cart_item->item_id])}} method="get">
                                        @csrf
                                    <button
                                        class="text-md hover:shadow-lg p-2 bg-yellow-300 rounded-md">Update
                                    </button>
                                    </form>
                                    <form method="post" action= {{route('deletecart', ['item_id' => $cart_item->item_id])}} >
                                        @csrf
                                        <button
                                            class="text-md hover:shadow-lg p-2 bg-red-500 rounded-md text-white">Delete
                                        </button>
                                    </form>
                                </th>
                        </tr>
                        @else
                            <tr class="text-md bg-yellow-100 text-left border border-sky-900">
                                    <th class="p-2 border-r border-r-sky-900 font-normal text-md">{{ $loop->iteration }}</th>
                                    @if (str_starts_with($cart_item->product_img, 'https'))
                                        <th class="p-2 border-r border-r-sky-900 font-normal text-md"><img
                                                src="{{ $cart_item->product_img }}" alt="product Image" width="100px"
                                                height="50px"></th>
                                    @else
                                        <th class="p-2 border-r border-r-sky-900 font-normal text-md"><img
                                                src="{{ asset('storage/' . $cart_item->product_img) }}}" alt="product Image"
                                                width="100px" height="50px"></th>
                                    @endif
                                    <th class="p-2 border-r border-r-sky-900 font-normal text-md"> {{ $cart_item->product_name }}
                                    </th>
                                    <th class="p-2 border-r border-r-sky-900 font-normal text-md"> IDR. {{ $cart_item->price }}
                                    </th>
                                    <th class="p-2 border-r border-r-sky-900 font-normal text-md">{{ $cart_item->quantity }}</th>
                                    @php
                                        $qty = $cart_item->quantity;
                                        $total = $cart_item->quantity * $cart_item->price;
                                    @endphp
                                    <th class="p-2 border-r border-r-sky-900 font-normal text-md"> IDR. {{ $total }}</th>
                                    <th class="p-2 flex space-x-2">
                                        <form action={{route('updatecart', ['item_id' => $cart_item->item_id])}} method="get">
                                            @csrf
                                        <button
                                            class="text-md hover:shadow-lg p-2 bg-yellow-300 rounded-md">Update
                                        </button>
                                        </form>
                                        <form method="post" action= {{route('deletecart', ['item_id' => $cart_item->item_id])}} >
                                            @csrf
                                            <button
                                                class="text-md hover:shadow-lg p-2 bg-red-500 rounded-md text-white">Delete
                                            </button>
                                        </form>
                                    </th>
                            </tr>

                    @endif
                    @php
                        $grand_total = $grand_total + $total;
                        $amount = $loop->iteration;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <h3 class="text-md font-bold mb-4">Grand Total: <span>IDR. {{ $grand_total }}</span></h3>

        <h1 class="text-sky-700 text-2xl mb-4">Receiver</h1>
        <form method="post" action= {{route('checkout', ['items' => $items])}} class="flex flex-col space-y-4">
            @csrf
            <input type="text" required placeholder="Receiver Name" class="border border-sky-900 p-2 rounded-md">
            <textarea name="" id="" cols="15" rows="5" placeholder="Receiver Address" required
                class="border border-sky-900 p-2 rounded-md"></textarea>
            <button class="w-32 rounded-md p-2 rounded-md hover:font-bold bg-yellow-400 p-2" type="submit">Checkout
                ({{$amount}})</button>
        </form>

            @else
                <h2 class="font-normal text-lg mt-60 place-self-center">Cart is empty!, Let's go shopping :)</h2>
        @endif
    </div>
@endsection

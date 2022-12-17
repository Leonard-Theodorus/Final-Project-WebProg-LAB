@extends('layouts.mainlayout')

@section('content')
    <div style="min-height: 75vh" class="flex flex-col px-32 my-8 pb-16">
        <h1 class="font-semibold text-2xl mb-4">My Transaction History</h1>
        @if(!$empty)
            @foreach ($dates as $date)
                @php
                    $tr = $transactions->where('transaction_date', '=', $date->transaction_date);
                @endphp
                    <div class="w-full mb-">
                        <button class="w-full bg-sky-100 flex px-4 py-2 border justify-between items-center">
                            <p class="text-sky-600"> {{$date->transaction_date}} </p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height=" 16" fill="#0369a1" class="bi bi-chevron-down" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/> </svg>
                        </button>
                    </div>
                    <div class="p-4 bg-slate-50">
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="font-bold text-md bg-yellow-100 text-left border-t border-t-sky-900">
                                    <th class="p-2 border-x border-x-white">No</th>
                                    <th class="p-2 border-x border-x-white">Item Image</th>
                                    <th class="p-2 border-x border-x-white">Item Name</th>
                                    <th class="p-2 border-x border-x-white">Item Price</th>
                                    <th class="p-2 border-x border-x-white">Quantity</th>
                                    <th class="p-2 border-x border-x-white">Total Price</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @php
                                    $grand_total = 0
                                @endphp
                                @foreach ($tr as $transaction)
                                    @if($loop->iteration % 2 != 0)
                                        <tr class="text-md bg-orange-100 text-left border border-white">
                                            <th class="p-2 font-normal text-md border border-white"> {{$loop->iteration}} </th>
                                            @if (str_starts_with($transaction->product_img, 'https'))
                                            <th class="p-2 font-normal text-md border border-white"><img src="{{ $transaction->product_img }}" alt="product image"
                                                width="100px" height="50">
                                            </th>
                                            @else
                                                <th class="p-2 font-normal text-md border border-white"><img src="{{ asset('storage/' . $transaction->product_img) }}"
                                                    alt="product image"
                                                    width="100px" height="50">
                                                </th>
                                            @endif
                                            @php
                                                $qty = $transaction->quantity;
                                                $total = $transaction->quantity * $transaction->price;
                                                $grand_total += $total
                                            @endphp
                                            <th class="p-2 font-normal text-md border border-white"> {{$transaction->product_name}} </th>
                                            <th class="p-2 font-normal text-md border border-white">IDR. {{$transaction->price}}</th>
                                            <th class="p-2 font-normal text-md border border-white"> {{$transaction->quantity}} </th>
                                            <th class="p-2 font-normal text-md border">IDR. {{$total}}</th>
                                        </tr>
                                        @else
                                        <tr class="text-md bg-yellow-100 text-left border border-white">
                                            <th class="p-2 font-normal text-md border border-white"> {{$loop->iteration}} </th>
                                            @if (str_starts_with($transaction->product_img, 'https'))
                                            <th class="p-2 font-normal text-md border border-white"><img src="{{ $transaction->product_img }}" alt="product image"
                                                width="100px" height="50">
                                            </th>
                                            @else
                                                <th class="p-2 font-normal text-md border border-white"><img src="{{ asset('storage/' . $transaction->product_img) }}"
                                                    alt="product image"
                                                    width="100px" height="50">
                                                </th>
                                            @endif
                                            @php
                                                $qty = $transaction->quantity;
                                                $total = $transaction->quantity * $transaction->price;
                                                $grand_total += $total
                                            @endphp
                                            <th class="p-2 font-normal text-md border border-white"> {{$transaction->product_name}} </th>
                                            <th class="p-2 font-normal text-md border border-white">IDR. {{$transaction->price}}</th>
                                            <th class="p-2 font-normal text-md border border-white"> {{$transaction->quantity}} </th>
                                            <th class="p-2 font-normal text-md border">IDR. {{$total}}</th>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr class="bg-orange-100 border border-white">
                                    <th></th><th></th><th></th><th></th>
                                    <th class="text-right font-normal p-2">Grand Total: </th>
                                    <th class="text-left font-normal p-2">IDR. {{$grand_total}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            @endforeach
            @else
            <h2 class="font-normal text-lg mt-60 place-self-center">No Transactions!, Let's go shopping :)</h2>
        @endif
    </div>
@endsection

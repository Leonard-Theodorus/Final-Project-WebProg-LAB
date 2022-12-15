@extends('layouts.mainlayout')

@section('content')
<div class="flex justify-center items-center min-h-full w-full mt-24">
    @if(session()->has('update_item_success'))
    <div class="alert alert-success alert-dismissible fade show text-green 500" role="alert">
        {{session('update_item_success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form enctype="multipart/form-data" method="post" class="flex flex-col w-1/4 space-y-4">
        <h1 class="text-sky-900 text-xl">Update Item</h1>
        @csrf
        <input class="border p-4 @error('update_item_ID')
            is-invalid
        @enderror" type="text" name="update_item_ID" required value="{{old ('update_item_ID')}}" placeholder="New item ID">
        @error('update_item_ID')
            <div class="invalid-feedback text-red 500">
                {{$message}}
            </div>
        @enderror
        <input class="border p-4 @error('update_item_price')
            is-invalid
        @enderror" type="text" name="update_item_price" required value="{{old ('update_item_price')}}" placeholder="New item price">
        @error('update_item_price')
            <div class="invalid-feedback text-red 500">
                {{$message}}
            </div>
        @enderror
        <input class="border p-4 @error('update_item_category')
            is-invalid
        @enderror" type="text" name="update_item_category" required value="{{old ('update_item_category')}}" placeholder="New item category">
        @error('update_item_category')
            <div class="invalid-feedback text-red 500">
                {{$message}}
            </div>
        @enderror
        {{-- kurang category dropdown list --}}
        <input class="border p-4 @error('update_item_name')
            is-invalid
        @enderror" type="text" name="update_item_name" required value="{{old ('update_item_name')}}" placeholder="New item name">
        @error('update_item_name')
            <div class="invalid-feedback text-red 500">
                {{$message}}
            </div>
        @enderror
        <input class="border p-4 @error('update_item_desc')
            is-invalid
        @enderror" type="text" name="update_item_desc" required value="{{old ('update_item_desc')}}" placeholder="New item desc">
        @error('update_item_desc')
            <div class="invalid-feedback text-red 500">
                {{$message}}
            </div>
        @enderror
        @if (str_starts_with($product->product_img , 'https'))
        <img style="width: 200px; height: 200px" src= {{$product->product_img}} alt="">
        @else
        <img style="width: 200px; height: 200px" src= {{asset('storage/'. $product->product_img)}} alt="">
        @endif


        {{-- nanti tuker jadi talwind aja, lalu delete dependency bootstrap di mainlayout --}}
        <div class="mb-3">
            <label for="update_item_img" class="form-label @error('update_item_img')
                is-invalid
            @enderror">Choose new image</label>
            <input class="form-control" type="file" name="update_item_img">
            @error('update_item_img')
                <div class="invalid-feedback text-red 500">
                    {{$message}}
                </div>
            @enderror
        </div>
        <input type="hidden" name="old_product_id", value= {{$product->item_id}}>

        <button class="w-24 bg-yellow-300 rounded-md py-2 self-end hover:font-bold" type="submit">Update</button>
    </form>
</div>
@endsection

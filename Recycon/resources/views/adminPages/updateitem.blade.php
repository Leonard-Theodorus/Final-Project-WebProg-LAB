@extends('layouts.mainlayout')

@section('content')
<div class="flex flex-col min-h-full w-full pt-8 px-36 pb-16">
    {{-- Success --}}
    @if(session()->has('update_item_success'))
    <div class="alert alert-success alert-dismissible fade show text-green-500" role="alert">
        {{session('update_item_success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h1 class="text-sky-900 text-2xl text-start">Update Item</h1>

    <form enctype="multipart/form-data" method="post" class="flex flex-col space-y-2">
        @csrf
        <div class="flex space-x-4">
            {{-- Input Item ID --}}
            <div class="flex flex-col">
                <label for="update_item_ID" class="font-semibold text-lg">Item ID</label>
                <input class="border p-4 @error('update_item_ID')
                    is-invalid
                @enderror" type="text" name="update_item_ID" required value="{{old ('update_item_ID')}}" placeholder="New item ID">
                @error('update_item_ID')
                    <div class="invalid-feedback text-red 500">
                        {{$message}}
                    </div>
                @enderror
            </div>
            {{-- Input Item Price --}}
            <div class="flex flex-col">
                <label for="update_item_price" class="font-semibold text-lg">Item Price</label>
                <input class="border p-4 @error('update_item_price')
                    is-invalid
                @enderror" type="text" name="update_item_price" required value="{{old ('update_item_price')}}" placeholder="New item price">
                @error('update_item_price')
                    <div class="invalid-feedback text-red 500">
                        {{$message}}
                    </div>
                @enderror
            </div>
            {{-- Input Item Category = Dropdown --}}
            <div class="flex flex-col">
                <label for="update_item_category" class="font-semibold text-lg">Item Category</label>
                <select class="border p-4 @error('update_item_category')
                    is-invalid
                @enderror" type="text" name="update_item_category" required value="{{old ('update_item_category')}}" placeholder="New item category">
                    <option value="" selected="true" disabled="disabled">Choose category</option>
                    <option value="Recycle">Recycle</option>
                    <option value="Second">Second</option>
                </select>
                @error('update_item_category')
                    <div class="invalid-feedback text-red 500">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        {{-- Input Item Name --}}
        <div class="flex flex-col">
            <label for="update_item_name" class="font-semibold text-lg">Item Name</label>
            <input class="border p-4 @error('update_item_name')
                is-invalid
            @enderror" type="text" name="update_item_name" required value="{{old ('update_item_name')}}" placeholder="New item name">
            @error('update_item_name')
                <div class="invalid-feedback text-red 500">
                    {{$message}}
                </div>
            @enderror
        </div>
        {{-- Input Item Desc --}}
        <div class="flex flex-col">
            <label for="update_item_desc" class="font-semibold text-lg">Item Desc</label>
            <input class="border p-4 @error('update_item_desc')
                is-invalid
            @enderror" type="text" name="update_item_desc" required value="{{old ('update_item_desc')}}" placeholder="New item desc">
            @error('update_item_desc')
                <div class="invalid-feedback text-red 500">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="flex space-x-4">
            {{-- Item Image --}}
            <div class="flex flex-col">
                <label class="font-semibold text-lg" for="item_image">Item Image</label>
                @if (str_starts_with($product->product_img , 'https'))
                    <img style="width: 150px; height: 100px" src= {{$product->product_img}} alt="">
                @else
                    <img style="width: 150px; height: 100px" src= {{asset('storage/'. $product->product_img)}} alt="">
                @endif
            </div>
            <div class="mb-3 flex flex-col justify-center">
                <label class="font-semibold" for="update_item_img" class="form-label @error('update_item_img')
                    is-invalid
                @enderror">Choose new image</label>
                <input class="form-control" type="file" name="update_item_img">
                @error('update_item_img')
                    <div class="invalid-feedback text-red 500">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>

        <input type="hidden" name="old_product_id", value= {{$product->item_id}}>
        <button class="w-24 bg-yellow-300 rounded-md py-2 self-end hover:font-bold" type="submit">Update</button>
    </form>
</div>
@endsection

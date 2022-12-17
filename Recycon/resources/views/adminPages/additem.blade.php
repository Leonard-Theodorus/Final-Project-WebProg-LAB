@extends('layouts.mainlayout')

@section('content')
<div class="flex flex-col min-h-full w-full pt-8 px-36 pb-16">
    @if(session()->has('add_item_success'))
    <div class="alert alert-success alert-dismissible fade show text-green-500" role="alert">
        {{session('add_item_success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h1 class="text-sky-900 text-2xl text-start">Add Item</h1>

    <form enctype="multipart/form-data" action= {{route('additem')}} method="post" class="flex flex-col space-y-2">
        @csrf
        <div class="flex space-x-4">
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
        <div class="flex flex-col">
            <label for="current_img" class="font-semibold text-lg">Item Image File</label>
        </div>

        <div class="flex space-x-4">
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
        <button class="w-24 bg-yellow-300 rounded-md py-2 self-end hover:font-bold" type="submit">Add</button>
    </form>
</div>
@endsection

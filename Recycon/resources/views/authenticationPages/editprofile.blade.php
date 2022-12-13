@extends('layouts.mainlayout')

@section('content')
<div class="flex justify-center items-center min-h-full w-full mt-24">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{-- warna text buat message success jadiin hijau --}}
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('editprofile') }}" method="post" class="flex flex-col w-1/4 space-y-4">
        <h1 class="text-sky-900 text-xl">Edit Profile</h1>
        @csrf
        <input class="border p-4" type="text" name="username" required autofocus value="{{old ('username')}}" placeholder="Enter new username">
        @error('username')
        <div class="invalid-feedback">
            {{-- disini juga warna textnya nanti jadiin merah buat error2 disini --}}
            {{$message}}
        </div>
        @enderror
        <input class="border p-4" type="email" name="email" required value="{{old ('email')}}" id="floatingInput" placeholder="Enter new email">
        @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <button class="w-24 bg-yellow-300 rounded-md py-2 self-end hover:font-bold" type="submit">Save</button>
    </form>

</div>
@endsection

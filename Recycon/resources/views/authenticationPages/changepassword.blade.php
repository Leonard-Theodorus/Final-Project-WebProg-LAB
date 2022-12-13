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
    @if (session()->has('changePasswordError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{-- warna text buat message error jadiin merah --}}
            {{session('changePasswordError')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('changepassword') }}" method="post" class="flex flex-col w-1/4 space-y-4">
        <h1 class="text-sky-900 text-xl">Change Password</h1>
        @csrf
        <input class="border p-4" type="password" name="old_pass" required autofocus  placeholder="Enter old password">
        @error('old_pass')
        <div class="invalid-feedback">
            {{-- disini juga warna textnya nanti jadiin merah buat error2 disini --}}
            {{$message}}
        </div>
        @enderror
        <input class="border p-4" type="password" name="new_pass" required placeholder="Enter new password">
        @error('new_pass')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <input class="border p-4" type="password" name="new_pass_re" required placeholder="Confirm new password">
        @error('new_pass_re')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <button class="w-24 bg-yellow-300 rounded-md py-2 self-end hover:font-bold" type="submit">Save</button>
    </form>

</div>
@endsection

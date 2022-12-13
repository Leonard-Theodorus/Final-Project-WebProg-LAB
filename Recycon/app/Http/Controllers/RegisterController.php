<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('authenticationPages.register', ['title' => 'Register']);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255'],
            'repassword' => ['same:password']
        ],
        [
            'repassword.same' => "Pasword must match"
        ]
        );
        if(str_contains('admin', $validated['name'])){
            $validated['is_admin'] = true;
        }
        $validated['is_admin'] = false;
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect('/login')->with('success', 'Sign-up sucessful! Please login');

    }

}

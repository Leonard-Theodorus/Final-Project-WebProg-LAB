<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('homepage.home', ['title' => 'Home']);
    }
    public function re(){
        return redirect('/home');
    }
}

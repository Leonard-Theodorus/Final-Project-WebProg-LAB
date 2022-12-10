<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('guestPages.home', ['title' => 'Home']);
    }
    
    public function re(){
        return redirect('guestPages.home');
    }
}

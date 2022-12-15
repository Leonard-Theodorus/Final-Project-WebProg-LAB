<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(3);
        return view('guestPages.product', ['title' => 'Our Products', 'products' => $products]);
    }

    public function show_detail(Request $req){
        $coressponding_product = Product::where('item_id', '=', $req->item_id)->first();
        return view('guestPages.detail', ['product' => $coressponding_product, 'title' => 'Item Detail']);
    }
}

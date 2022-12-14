<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminDeleteItem(Request $req){
        $corresponding_product = Product::find($req->product_delete);
        DB::table('products')->where('id', '=', $corresponding_product->id)->delete();
        return redirect(route('viewitem'))->with('success', 'Item Sucessfully Deleted!');
    }
    public function adminUpdateItem(Request $req){
        $corresponding_product = Product::find($req->product_delete);
        return view('adminPages.updateitem', ['title' => 'Update Product', 'product'=> $corresponding_product]);
    }
}

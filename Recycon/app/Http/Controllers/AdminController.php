<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminViewItem(){
        $products = Product::all();
        return view('adminPages.viewitem', ['title' => 'Manage Item', 'products' => $products]);
    }
    public function adminDeleteItem(Request $req){
        $corresponding_product = Product::find($req->product_delete);
        DB::table('products')->where('id', '=', $corresponding_product->id)->delete();
        return redirect(route('viewitem'))->with('success', 'Item Sucessfully Deleted!');
    }
    public function adminUpdateItem(Request $req){
        $corresponding_product = Product::where('item_id', '=', $req->product_update_id)->first();
        return view('adminPages.updateitem', ['title' => 'Update Product', 'product'=> $corresponding_product]);
    }
    public function updateItemLogic(Request $req){
        $validated = $req->validate([
            'update_item_ID' => ['required', 'unique:products,item_id'],
            'update_item_name' => ['required', 'unique:products,product_name', 'max:20'],
            'update_item_price' => ['required', 'Integer', 'min:1000'],
            'update_item_desc' => ['required', 'max:200'],
            'update_item_category' => ['required', Rule::in(['Recycle', 'Second'])],
            'update_item_img' => ['required', 'image']
        ],);
        if($req->file('update_item_img')){
            $og_filename = $req->file('update_item_img')->getClientOriginalName();
            $validated['update_item_img'] = $req->file('update_item_img')->storeAs('new-images', $og_filename);
        }
        DB::table('products')->where('item_id', '=', $req->old_product_id)->update([
            'item_id' => $validated['update_item_ID'],
            'product_name' => $validated['update_item_name'],
            'price' => $validated['update_item_price'],
            'description' => $validated['update_item_desc'],
            'category' => $validated['update_item_category'],
            'product_img' => $validated['update_item_img']
        ]);
        return redirect(route('updateitem', ['product_update_id' => $validated['update_item_ID']]))->with('update_item_success', 'Item sucessfully updated!');
    }
    public function adminAddItem(){
        return view('adminPages.additem', ['title' => 'Add Item']);
    }
    public function addItemLogic(Request $req){
        $validated = $req->validate([
            'update_item_ID' => ['required', 'unique:products,item_id'],
            'update_item_name' => ['required', 'unique:products,product_name', 'max:20'],
            'update_item_price' => ['required', 'Integer', 'min:1000'],
            'update_item_desc' => ['required', 'max:200'],
            'update_item_category' => ['required', Rule::in(['Recycle', 'Second'])],
            'update_item_img' => ['required', 'image']
        ],);
        if($req->file('update_item_img')){
            $og_filename = $req->file('update_item_img')->getClientOriginalName();
            $validated['update_item_img'] = $req->file('update_item_img')->storeAs('new-images', $og_filename);
        }
        DB::table('products')->insert([
            'item_id' => $validated['update_item_ID'],
            'product_name' => $validated['update_item_name'],
            'price' => $validated['update_item_price'],
            'description' => $validated['update_item_desc'],
            'category' => $validated['update_item_category'],
            'product_img' => $validated['update_item_img']
        ]);
        return redirect(route('additem'))->with('add_item_success', 'Item sucessfully added!');
    }
}

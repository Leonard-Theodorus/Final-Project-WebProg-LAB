<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function showcart(){
        $user_id = Auth()->user()->id;
        $cart_items = Cart::join('products', 'products.id', '=', 'carts.item_id')->where('user_id', '=', $user_id)->get([
            'products.product_name', 'products.product_img', 'products.price', 'carts.quantity', 'products.item_id',
            'products.category', 'products.description', 'products.id'
        ]);
        $is_empty = false;
        if(count($cart_items) == 0){
            $is_empty = true;
        }
        return view('customerPages.cart', ['title' => 'My Cart', 'cart_items' => $cart_items, 'empty' => $is_empty]);
    }
    public function insert_to_cart(Request $req){
        $user_id = Auth()->user()->id;
        $item_id = $req->product_id;
        $quantity = $req->quantity;
        $old_quantity = (Cart::where('item_id', '=', $item_id)->first() ) ? Cart::where('item_id', '=', $item_id)->first()->quantity: 0 ;
        DB::table('carts')->updateOrInsert([
            'item_id' => $item_id
        ],
        [
            'user_id' => $user_id,
            'item_id' => $item_id,
            'quantity' => $quantity + $old_quantity
        ]);
        return redirect(route('showproduct'))->with('add_to_cart_success', 'Item added to cart!');
    }
    public function update_cart(){
        $user_id = Auth()->user()->id;
        $corresponding_item = Cart::join('products', 'products.id', '=', 'carts.item_id')->where('user_id', '=', $user_id)->get([
            'products.product_name', 'products.product_img', 'products.price', 'carts.quantity', 'products.item_id',
            'products.category', 'products.description', 'products.id'
        ])->first();
        return view('customerPages.updatecart', ['title' => 'Update order', 'product' => $corresponding_item]);
    }
    public function update_cart_logic(Request $req){
        $item_id = $req->product_id;
        $quantity = $req->quantity;
        DB::table('carts')->updateOrInsert([
            'item_id' => $item_id
        ],
        [
            'quantity' => $quantity
        ]);
        return redirect(route('cart'))->with('update_cart_success', 'Order Updated!');
    }
    public function delete_cart_item(Request $req){
        $corresponding_product = Product::where('item_id', '=', $req->item_id)->first();
        DB::table('carts')->where('item_id', '=', $corresponding_product->id)->delete();
        return redirect(route('cart'))->with('delete_success', 'Order Deleted!');
    }
    public function checkout(){
        $user_id = Auth()->user()->id;
        $items = Cart::join('products', 'products.id', '=', 'carts.item_id')->where('user_id', '=', $user_id)->get([
            'products.product_name', 'products.product_img', 'products.price', 'carts.quantity', 'products.item_id',
            'products.category', 'products.description', 'products.id'
        ]);
        $date = Carbon::now()->toDateString();
        foreach ($items as $item) {
            $old_quantity = (Transaction::where('item_id', '=', $item->id)->first() )
            ? Transaction::where('item_id', '=', $item->id)->first()->quantity: 0 ;
            DB::table('transactions')->updateOrInsert(
            [
                'item_id' => $item->id
            ],
            [
                'user_id' => $user_id,
                'item_id' => $item->id,
                'quantity' => $item->quantity + $old_quantity,
                'transaction_date' => $date
            ]);
        }
        DB::table('carts')->where('user_id', '=', $user_id)->delete();
        return redirect(route('showproduct'))->with('checkout_success', 'Checkout Successful!');
    }

    public function show_transaction_history(){
        $user_id = Auth()->user()->id;
        $dates = DB::table('transactions')->select('transaction_date')->groupBy('transaction_date')->get();
        $transactions = Transaction::join('products', 'products.id', '=', 'transactions.item_id')->where('user_id', '=', $user_id)->get([
            'products.product_name', 'products.product_img', 'products.price', 'transactions.quantity', 'transactions.transaction_date'
        ]);
        $is_empty = false;
        if(count($transactions) == 0){
            $is_empty = true;
        }
        return view('customerPages.transactionhistory', ['title' => 'Transaction History',
        'transactions' => $transactions, 'empty' => $is_empty, 'dates' => $dates]);
    }
}

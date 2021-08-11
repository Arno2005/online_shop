<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\Cart;


use Auth;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::where("user_id", Auth::id())->with(["user","product"])->get();

        return view("pages.cart.index", compact(["carts"]));
    }

    public function store(Request $request){
        $cart = Cart::where("user_id", Auth::id())->where("product_id", $request->id)->first();

        if(!$cart) {
            $user_id = Auth::id();
            $product_id = $request->id;
            $count = 1;

            $cart = new Cart();

            $cart->user_id = $user_id;
            $cart->product_id = $product_id;
            $cart->count = $count;

            $cart->save();
        }else{
            $cart->count +=1;

            $cart->save();
        }


        return redirect("/carts");

    }

    public function plus($id){
        $cart = Cart::where("user_id", Auth::id());
    }

    public function delete($id){
        Cart::destroy($id);

        return redirect("/carts");
    }
}

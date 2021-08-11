<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\Cart;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::with(["user","product"])->get();
        dd($carts->toArray());
    }
}

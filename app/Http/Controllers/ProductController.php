<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Product;

use Auth;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with(["user","carts", "histories"])->get();
        $current_id = Auth::id();

        return view("pages.products.index", compact(["products", "current_id"]));
    }

    public function create(){
        return view("pages.products.create");
    }

    public function store(Request $request){


        $user_id = Auth::id();
        $name = $request->name;
        $count = $request->count;
        $price = $request->price;

        $product = new Product();
        $product->user_id = $user_id;
        $product->name = $name;
        $product->count = $count;
        $product->price = $price;

        $product->save();

        return redirect("/products");

    }

    public function edit($id){
        $product = Product::find($id);

        return view("pages.products.edit", compact(["product"]));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);

        $name = $request->name;
        $count = $request->count;
        $price = $request->price;

        $product->name = $name;
        $product->count = $count;
        $product->price = $price;

        $product->save();


        return redirect("/products");
    }

    public function delete($id){
        Product::destroy($id);

        return redirect("/products");
    }
}

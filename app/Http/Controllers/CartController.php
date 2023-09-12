<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;

class CartController extends Controller
{    private $product;

    public function addCart(Request $request, $id){
        $this->product = Product::find($id);
        ShoppingCart::add($this->product->id,$this->product->name,$request->qty,$this->product->selling_price, ['image' =>$this->product->image,'category'=>$this->product->Category_Name,'brand'=>$this->product->brand->name]);
        return redirect('/show-cart');
    }
    public function cart(){
        return view('website.cart.index',['cart_products' => ShoppingCart::all()]);
    }
    public function removeCartProduct($id){
       ShoppingCart::remove($id);
       return redirect('/show-cart')->with('msg','Cart product remove successfully');
    }
    public function updateCartProduct(Request $request,$id){
        ShoppingCart::update($id,$request->qty);
        return redirect('/show-cart')->with('msg','Cart product update successfully');

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\Product;

class Myecommerce extends Controller
{
    public function index(){
        return view('website.home.index',[
            'categories' => CategoryModel::all(),
            'products' => Product::orderBy('id','desc')->take('8')->get(['id','category_id','name','selling_price','image'])
        ]);
    }
    public function category($id){
        return view('website.category.index',[
            'products' => Product::where('category_id',$id)->orderBy('id','desc')->get()
        ]);
    }
    public function detail($id){
        return view('website.detail.index',['product'=>Product::find($id)]);
    }

}

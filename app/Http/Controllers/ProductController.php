<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CategoryModel;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function addProduct(){
        return view('admin.product.add',[
            'categories'    => CategoryModel::all(),
            'sub_categories'=> SubCategory::all(),
            'brands'        => Brand::all(),
            'units'         => Unit::all(),
        ]);
    }

    public function getSubCategoryByCategory(){

        return response()->json(SubCategory::where('category_id',$_GET['id'])->get());
    }
    public function create(Request $request){
       $this->product = Product::newProduct($request);
       OtherImage::newOtherImage($request->other_image,$this->product->id);
       return back()->with('msgs','Product Created Successfully');
    }
    public function manageProduct(){
        return view('admin.product.manage',['products'=>Product::all()]);
    }
    public function detail($id){
        return view('admin.product.detail',['product'=>Product::find($id)]);
    }
    public function edit($id){
        return view('admin.product.edit',[
            'product'       => Product::find($id),
            'categories'    => CategoryModel::all(),
            'sub_categories'=> SubCategory::all(),
            'brands'        => Brand::all(),
            'units'         => Unit::all(),
        ]);
    }
    public function update(Request $request,$id){
        Product::updatedProduct($request,$id);
        if($request->other_image){
            OtherImage::updateOtherImage($request->other_image,$id);
        }
        return redirect('/product/manage')->with('msg','Product Updated Successfully');
    }
    public function delete($id){
        Product::deleteProduct($id);
        OtherImage::deleteOtherImage($id);
        return redirect('/product/manage')->with('msg','Product Deleted Successfully');
    }
}

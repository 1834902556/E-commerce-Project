<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add');
    }
    public function create(Request $request){
        Brand::newBrand($request);
        return back()->with('msgs','Brand Created Successfully');
    }
    public function manageBrand(){
        return view('admin.brand.manage',['brands'=>Brand::all()]);
    }
    public function edit($id){
        return view('admin.brand.edit',[
            'brand'=> Brand::find($id)
        ]);
    }
    public function update(Request $request,$id){
        Brand::updatedBrand($request,$id);
        return redirect('/brand/manage')->with('msg','Brand Updated Successfully');
    }
    public function delete($id){
        Brand::deleteBrand($id);
        return redirect('/brand/manage')->with('msg','Brand Deleted Successfully');
    }
}

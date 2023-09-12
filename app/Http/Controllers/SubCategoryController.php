<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function addSubCategory(){
        return view('admin.sub-category.add',['categories' => CategoryModel::all()]);
    }
    public function create(Request $request){
       SubCategory::newSubCategory($request);
       return back()->with('msgs','Sub Category Created Successfully');
    }
    public function manageSubCategory(){
        return view('admin.sub-category.manage',[
        'sub_categories' =>SubCategory::all()
    ]);
    }
    public function edit($id){
        return view('admin.sub-category.edit',[
            'sub_category'=> SubCategory::find($id),
            'categories'=> CategoryModel::all()
        ]);
    }
    public function update(Request $request,$id){
        SubCategory::updatedSubCategory($request,$id);
        return redirect('/sub-category/manage')->with('msg','Sub Category Updated Successfully');
    }
    public function delete($id){
        SubCategory::deleteSubCategory($id);
        return redirect('/sub-category/manage')->with('msg','Sub Category Deleted Successfully');
    }
}

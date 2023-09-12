<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add_category');
    }
    public function create(Request $request){
       CategoryModel::newCategory($request);
       return back()->with('msg','Category Created Successfully');
    }
    public function manageCategory(){
        return view('admin.category.manage_category',['categories'=>CategoryModel::all()]);
    }
    public function edit($id){
        return view('admin.category.edit',['category'=> CategoryModel::find($id)]);
    }
    public function update(Request $request,$id){
        CategoryModel::updatedCategory($request,$id);
        return redirect('/category/manage')->with('msg','Category Updated Successfully');
    }
    public function delete($id){
        CategoryModel::deleteCategory($id);
        return redirect('/category/manage')->with('msg','Category Deleted Successfully');
    }
}

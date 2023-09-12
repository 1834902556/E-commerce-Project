<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function addUnit(){
        return view('admin.unit.add');
    }
    public function create(Request $request){
        Unit::newUnit($request);
       return back()->with('msgs','Unit Created Successfully');
    }
    public function manageUnit(){
        return view('admin.unit.manage',['units'=>Unit::all()]);
    }
    public function edit($id){
        return view('admin.unit.edit',[
            'unit'=> Unit::find($id)
        ]);
    }
    public function update(Request $request,$id){
        Unit::updatedUnit($request,$id);
        return redirect('/unit/manage')->with('msg','Unit Updated Successfully');
    }
    public function delete($id){
        Unit::deleteUnit($id);
        return redirect('/unit/manage')->with('msg','Unit Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.add-unit');
    }
    public function manage()
    {
        return view('admin.unit.manage-unit',[
            'units'=>Unit::orderBy('id','DESC')->get()
        ]);
    }
    public function create(Request $request)
    {
        Unit::newUnit($request);
        return back()->with('message','A Unit Created Successfully');

    }
    public function edit($id)
    {
        return view('admin.unit.edit-unit',[
            'unit'=>Unit::find($id)
        ]);
    }
    public function delete($id)
    {
        Unit::deleteUnit($id);
        return back()->with('message','Unit Deleted Successfully');
    }
    public function update(Request $request, $id)
    {
        Unit::updateUnit($request,$id);
        return redirect('/manage-unit')->with('message','Unit Updated Successfully');
    }
}

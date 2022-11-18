<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        return view('admin.size.add-size');
    }
    public function manage()
    {
        return view('admin.size.manage-size',[
            'sizes'=>Size::orderBy('id','DESC')->get()
        ]);
    }
    public function create(Request $request)
    {
        Size::newSize($request);
        return back()->with('message','A size Created Successfully');

    }
    public function edit($id)
    {
        return view('admin.size.edit-size',[
            'size'=>Size::find($id)
        ]);
    }
    public function delete($id)
    {
        Size::deleteSize($id);
        return back()->with('message','Size Deleted Successfully');
    }
    public function update(Request $request, $id)
    {
        Size::updateSize($request,$id);
        return redirect('/manage-size')->with('message','Size Updated Successfully');
    }
}

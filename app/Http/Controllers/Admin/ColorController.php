<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        return view('admin.color.add-color');
    }
    public function manage()
    {
        return view('admin.color.manage-color',[
            'colors'=>Color::orderBy('id','DESC')->get()
        ]);
    }
    public function create(Request $request)
    {
        Color::newColor($request);
        return back()->with('message','A Color Created Successfully');

    }
    public function edit($id)
    {
        return view('admin.color.edit-color',[
            'color'=>Color::find($id)
        ]);
    }
    public function delete($id)
    {
        Color::deleteColor($id);
        return back()->with('message','Color Deleted Successfully');
    }
    public function update(Request $request, $id)
    {
        Color::updateColor($request,$id);
        return redirect('/manage-color')->with('message','Color Updated Successfully');
    }
}

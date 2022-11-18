<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.add-brand');
    }
    public function manage()
    {
        return view('admin.brand.manage-brand',[
            'brands'=>Brand::orderBy('id','DESC')->get()
        ]);
    }
    public function create(Request $request)
    {
        Brand::newBrand($request);
        return back()->with('message','A Brand Created Successfully');

    }
    public function edit($id)
    {
        return view('admin.brand.edit-brand',[
            'brand'=>Brand::find($id)
        ]);
    }
    public function delete($id)
    {
        Brand::deleteBrand($id);
        return back()->with('message','Brand Deleted Successfully');
    }
    public function update(Request $request, $id)
    {
        Brand::updateBrand($request,$id);
        return redirect('/manage-brand')->with('message','Brand Updated Successfully');
    }
}

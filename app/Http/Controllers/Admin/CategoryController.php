<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.add-category');
    }
    public function manage()
    {
        return view('admin.category.manage-category',[
            'categories' => Category::orderBy('id','DESC')->get(),
        ]);
    }
    public function create(Request $request)
    {
//        return $request->all();
        Category::newCategory($request);
        return back()->with('message','A Category Created Successfully');
    }
    public function edit($id)
    {
        return view('admin.category.edit-category',[
            'category'=>Category::find($id),
        ]);
    }
    public function update(Request $request,$id)
    {
        Category::updateCategory($request,$id);
        return redirect('/manage-category')->with('message','Category Upadted Successfully');
    }
    public function delete($id)
    {
        Category::deleteSubCategory($id);
        return back()->with('message','Category Deleted Successfully');
    }
}

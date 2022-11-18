<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;



class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.add-sub-category',[
            'categories' => Category::all()
        ]);
    }
    public function manage()
    {
        return view('admin.sub-category.manage-sub-category',[
            'subCategories'=>SubCategory::orderBy('id','DESC')->get(),
        ]);
    }
    public function create(Request $request)
    {
        SubCategory::newSubCategory($request);
        return back()->with('message','A Sub Category Created Successfully');
    }
    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/manage-sub-category')->with('message', 'Sub Category Update SuccessFully');
    }
    public function edit($id)
    {
        return view('admin.sub-category.edit-sub-category',[
            'subCategory'=>SubCategory::find($id),
        ]);
    }
    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return back()->with('message','Sub-Category Deleted Successfully');
    }

}

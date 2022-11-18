<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    public function index()
    {
        return view('admin.child-category.add-child-category',[
            'subCategories' => SubCategory::all()
        ]);
    }

    public function getSubCategory()
    {
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }
    public function getChildCategory()
    {
        return response()->json(ChildCategory::where('sub_category_id', $_GET['id'])->get());
    }

    public function manage()
    {
        return view('admin.child-category.manage-child-category',[
            'childCategories'=>ChildCategory::all()
        ]);
    }
    public function create(Request $request)
    {
        ChildCategory::newChildCategory($request);
        return back()->with('message','A Child Category Created Successfully');
    }
    public function update(Request $request, $id)
    {
        ChildCategory::updateChildCategory($request, $id);
        return redirect('/manage-child-category')->with('message', 'Child Category Update SuccessFully');
    }
    public function edit($id)
    {
        return view('admin.child-category.edit-child-category',[
            'childCategory'=>ChildCategory::find($id),
        ]);
    }
    public function delete($id)
    {
        ChildCategory::deleteChildCategory($id);
        return back()->with('message','Child-Category Deleted Successfully');
    }
}

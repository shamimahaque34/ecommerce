
@extends('admin.master')

@section('title')
    Add Child Category
@endsection


@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3 mx-auto">
                        <div class="card card-body">
                            <h4 class="text-center text-primary"> Add Child Category</h4>
                            <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                            <form action="{{route('create.child.category')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="categoryName" class="col-3 col-form-label">Under Main Category</label>
                                    <div class="col-9">
                                        <select class="form-control" name="category_id" onchange="getSubCategory(this.value)">
                                            <option>--Select Main Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="categoryName" class="col-3 col-form-label">Under Sub Category</label>
                                    <div class="col-9">
                                        <select class="form-control" name="sub_category_id" id="subCategorySelect">
                                            <option>--Select Sub Category--</option>
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ChildCategoryName" class="col-3 col-form-label">Child Category Name</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="ChildCategoryName" name="name" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-3 col-form-label">Description</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-3 col-form-label">Image</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                </div>
                                <div class="row col-12 mb-3">
                                    <label for="status" class="col-3 col-form-label">Status</label>
                                    <div class="col-9 mt-2">
                                        <div class="col-md-8">
                                            <label for=""><input type="radio" name="status" value="1" checked> Published </label>
                                            <label for=""><input type="radio" name="status" value="0" > Unpublished </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-content-end row">
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-primary w-50">Create Child Category</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

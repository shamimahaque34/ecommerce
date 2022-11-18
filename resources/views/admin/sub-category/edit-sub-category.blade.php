
@extends('admin.master')

@section('title')
    Edit Sub Category
@endsection


@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3 mx-auto">
                        <div class="card card-body">
                            <h4 class="text-center text-primary"> Edit Sub Category</h4>
                            <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                            <form action="{{route('update.sub.category',['id' => $subCategory->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
                                @csrf
                                <div class="row mb-3">
                                    <label for="categoryName" class="col-3 col-form-label">Main Category</label>
                                    <div class="col-9">
                                        <select class="form-control" name="category_id">
                                            <option>--Select Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $subCategory->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="SubCategoryName" class="col-3 col-form-label">Sub Category Name</label>
                                    <div class="col-9">
                                        <input type="text" value="{{$subCategory->name}}" class="form-control" id="name" name="name" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-3 col-form-label">Description</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="description" name="description">{{$subCategory->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-3 col-form-label">Image</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control" name="image" id="image">
                                        <img src="{{asset($subCategory->image)}}" style="height:80px; width:100px" alt="">
                                    </div>
                                </div>
                                <div class="row col-12 mb-3">
                                    <label for="status" class="col-3 col-form-label">Status</label>
                                    <div class="col-9 mt-2">
                                        <div class="col-md-8">
                                            <label for=""><input type="radio" name="status" value="1" @if($subCategory->status == 1) checked @endif> Published </label>
                                            <label for=""><input type="radio" name="status" value="0" @if($subCategory->status == 0) checked @endif> Unpublished </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-content-end row">
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-primary w-50">Update Sub Category</button>
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

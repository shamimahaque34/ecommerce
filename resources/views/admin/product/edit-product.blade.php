
@extends('admin.master')

@section('title')
    Edit Product
@endsection


@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3 mx-auto">
                        <div class="card card-body">
                            <h4 class="text-center text-primary"> Edit Regular Product</h4>
                            <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                            <form action="{{route('update.product',['id'=>$product->id])}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="categoryName" class="col-3 col-form-label">Under Category</label>
                                    <div class="col-9">
                                        <select class="form-control" name="category_id" onchange="getSubCategory(this.value)">
                                            <option>--Select Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $product->category_id? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="categorySelect" class="col-3 col-form-label">Under Sub Category</label>
                                    <div class="col-9">
                                        <select class="form-control" name="sub_category_id" id="subCategorySelect" onchange="getchildCategory(this.value)">
                                            <option>--Select Sub Category--</option>
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{$subCategory->id}}" {{$subCategory->id == $product->sub_category_id? 'selected' : ''}} >{{$subCategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ChildCategorySelect" class="col-3 col-form-label">Under Child Category</label>
                                    <div class="col-9">
                                        <select class="form-control" name="child_category_id" id="childCategorySelect">
                                            <option>--Select Child Category--</option>
                                            @foreach($childCategories as $childCategory)
                                                <option value="{{$childCategory->id}}" {{$childCategory->id == $product->child_category_id? 'selected': ''}}>{{$childCategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="brand" class="col-3 col-form-label">Brand</label>
                                    <div class="col-9">
                                        <select class="form-control" name="brand_id" id="brand">
                                            <option >--Select Brand--</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" {{$brand->id == $product->brand_id? 'selected': ''}}>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="unit" class="col-3 col-form-label">Unit</label>
                                    <div class="col-9">
                                        <select class="form-control" name="unit_id" id="unit">
                                            <option >--Select Unit--</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}" {{$unit->id == $product->unit_id? 'selected': ''}}>{{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="color" class="col-3 col-form-label">Add Color</label>
                                    <div class="col-9">
                                        <select class="js-example-basic-multiple" name="colors[]" multiple="multiple">
                                            <option disabled >--Select Color--</option>
                                            @foreach($colors as $color)
                                                <option value="{{$color->id}}" @if(!empty($product->productColors)) @foreach($product->productColors as $productColor) @if($productColor->color_id == $color->id) selected @endif @endforeach @endif >{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="size" class="col-3 col-form-label">Add Size</label>
                                    <div class="col-9">
                                        <select class="js-example-basic-multiple" name="sizes[]" multiple="multiple">
                                            <option disabled>--Select Size--</option>
                                            @foreach($sizes as $size)
                                                <option value="{{$size->id}}" @if(!empty($product->productSizes)) @foreach($product->productSizes as $productSize) @if($productSize->size_id == $size->id) selected @endif @endforeach @endif >{{$size->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="product_name" class="col-3 col-form-label">Product Name</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="product_name" value="{{$product->name}}" name="name" placeholder="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="product_code" class="col-3 col-form-label">Product Code</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="product_code" value="{{$product->code}}" name="code" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="short_description" class="col-3 col-form-label">Short Description</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="short_description" name="short_description">{{$product->short_description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="long_description" class="col-3 col-form-label">Long Description</label>
                                    <div class="col-9">
                                        <textarea  class="form-control" id="long_description" name="long_description" cols="30" rows="10">{{$product->long_description}}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-3 col-form-label">Feature Image</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control" name="image" id="image">
                                        <img src="{{asset($product->image)}}" alt="" style="height: 100px; width: 100px">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="other_image" class="col-3 col-form-label">Other Image</label>
                                    <div class="col-9">
                                        <input type="file" name="other_image[]"  multiple class="form-control"/>
                                        @foreach($product->otherImages as $otherImage)
                                            <img src="{{asset($otherImage->image)}}" class="img-thumbnail" style="height: 100px;width: 100px" alt="">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="metaTag" class="col-3 col-form-label">Meta Tag</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="metaTag" value="{{$product->meta_tag}}" name="meta_tag" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="meta_description" class="col-3 col-form-label">Meta Description</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="meta_description" name="meta_description">{{$product->meta_description}}</textarea>
                                    </div>
                                </div>

                                <div class="row col-12 mb-3">
                                    <label for="status" class="col-3 col-form-label">Status</label>
                                    <div class="col-9 mt-2">
                                        <div class="col-md-8">
                                            <label for=""><input type="radio" name="status" {{$product->status == 1 ? 'checked' : ' '}} value="1" > Published </label>
                                            <label for=""><input type="radio" name="status" {{$product->status == 0 ? 'checked' : ' '}} value="0" > Unpublished </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-content-end row">
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-primary w-50">Update Product</button>
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

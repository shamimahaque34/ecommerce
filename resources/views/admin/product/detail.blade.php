
@extends('admin.master')

@section('title')
    Product Detail
@endsection


@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3 mx-auto">
                        <div class="card card-body">
                            <h4 class="text-center text-primary">Product Detail</h4>
                            <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tbody>
                                <tr>
                                    <th>Product Id</th>
                                    <td>{{$product->id}}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{$product->category->name}}</td>
                                </tr>
                                <tr>
                                    <th>Sub Category</th>
                                    <td>{{$product->subCategory->name}}</td>
                                </tr>
                                <tr>
                                    <th>Child Category</th>
                                    <td>{{$product->childCategory->name}}</td>
                                </tr>
                                <tr>
                                    <th>Brand</th>
                                    <td>{{$product->brand->name}}</td>
                                </tr>
                                <tr>
                                    <th>Unit</th>
                                    <td>{{$product->unit->name}}</td>
                                </tr>
                                <tr>
                                    <th>Colors</th>
                                    <td>
                                        @foreach($product->productColors as $key => $productColor)
                                            {{ $productColor->color->name }} @if($key != (count($product->productColors) - 1)) , @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sizes</th>
                                    <td>
                                        @foreach($product->productSizes as $key=> $productSize)
                                            {{$productSize->size->name}} @if($key != (count($product->productSizes) - 1)),@endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Name</th>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr>
                                    <th>Product Code</th>
                                    <td>{{$product->code}}</td>
                                </tr>
                                <tr>
                                    <th>Short Description</th>
                                    <td>{{$product->short_description}}</td>
                                </tr>
                                <tr>
                                    <th>Long Description</th>
                                    <td>{!! $product->long_description !!}</td>
                                </tr>
                                <tr>
                                    <th>Feature Image</th>
                                    <td>
                                        <img src="{{asset($product->image)}}" alt="" style="height: 200px;width: 200px">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Other Image</th>
                                    <td>
                                        @foreach($product->otherImages as $otherImage)
                                            <img src="{{asset($otherImage->image)}}" class="img-thumbnail" style="height: 100px;width: 100px" alt="">
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Meta Tag</th>
                                    <td>{{$product->meta_tag}}</td>
                                </tr>
                                <tr>
                                    <th>Meta Description</th>
                                    <td>{{$product->meta_description}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

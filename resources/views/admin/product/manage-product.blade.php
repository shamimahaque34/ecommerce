@extends('admin.master')

@section('title')
    Manage Regular Product
@endsection

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12 mt-3 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center text-primary"> Manage Regular Product Table</h4>
                                <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="buttons-table-preview">

                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Category</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Feature Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$product->category->name}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->code}}</td>
                                                <td><img src="{{$product->image}}" height="50" width="50" alt="image"></td>
                                                <td>{{$product->status == 1 ? 'Published':'Unpublished'}}</td>
                                                <td>
                                                    <a href="{{route('detail.product',['id'=>$product->id])}}" class="btn btn-info btn-sm">
                                                        <span class="">Dtails</span>
                                                    </a>
                                                    <a href="{{route('edit.product',['id'=>$product->id])}}" class="btn btn-success btn-sm">
                                                        <span class="">Edit</span>
                                                    </a>
                                                    <a href="{{route('delete.product',['id'=>$product->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...')">
                                                        <span class="">Del</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>



                                    </div> <!-- end preview-->

                                </div> <!-- end tab-content-->

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
            </div>
        </div>
    </div>
@endsection

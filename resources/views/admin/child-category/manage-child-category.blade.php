@extends('admin.master')

@section('title')
    Manage Child Category
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
                                <h4 class="text-center text-primary"> Manage Child Category Table</h4>
                                <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="buttons-table-preview">
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Child Category</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($childCategories as $childCategory)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$childCategory->category->name}}</td>
                                                <td>{{$childCategory->SubCategory->name}}</td>
                                                <td>{{$childCategory->name}}</td>
                                                <td>{{$childCategory->description}}</td>
                                                <td>
                                                    <img src="{{$childCategory->image}}" height="50" width="50" alt="image">
                                                </td>
                                                <td>{{$childCategory->status == 1 ? 'Published':'Unpublished'}}</td>
                                                <td>
                                                    <a href="{{route('edit.child.category',['id'=>$childCategory->id])}}" class="btn btn-success btn-sm">
                                                        <span class="">Edit</span>
                                                    </a>
                                                    <a href="{{route('delete.child.category',['id'=>$childCategory->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...')">
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

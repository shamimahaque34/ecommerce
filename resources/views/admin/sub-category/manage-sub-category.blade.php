@extends('admin.master')

@section('title')
    Manage Sub Category
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
                                <h4 class="text-center text-primary"> Manage Sub Category Table</h4>
                                <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="buttons-table-preview">
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Category Name</th>
                                                <th>Sub Category Name</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($subCategories as $subCategory)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$subCategory->category->name}}</td>
                                                <td>{{$subCategory->name}}</td>
                                                <td>{{$subCategory->description}}</td>
                                                <td>
                                                    <img src="{{$subCategory->image}}" height="40" width="40" alt="image">
                                                </td>
                                                <td>{{$subCategory->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                                <td>
                                                    <a href="{{route('edit.sub.category',['id' => $subCategory->id])}}" class="btn btn-success btn-sm">
                                                        <span class="">Edit</span>
                                                    </a>
                                                    <a href="{{route('delete.sub.category',['id' => $subCategory->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...')">
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

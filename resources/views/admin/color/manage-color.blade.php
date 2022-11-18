@extends('admin.master')

@section('title')
    Manage Color
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
                                <h4 class="text-center text-primary"> Manage ColorTable</h4>
                                <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="buttons-table-preview">
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Color Name</th>
                                                <th>Color Code</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($colors as $color)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$color->name}}</td>
                                                    <td>{{$color->code}}</td>
                                                    <td>{{$color->description}}</td>
                                                    <td>{{$color->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                                    <td>
                                                        <a href="{{route('edit.color',['id'=>$color->id])}}" class="btn btn-success btn-sm">
                                                            <span class="">Edit</span>
                                                        </a>
                                                        <a href="{{route('delete.color',['id'=>$color->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...')">
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

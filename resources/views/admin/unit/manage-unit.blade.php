@extends('admin.master')

@section('title')
    Manage Unit
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
                                <h4 class="text-center text-primary"> Manage Unit Table</h4>
                                <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="buttons-table-preview">
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Unit Name</th>
                                                <th>Unit Code</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($units as $unit)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$unit->name}}</td>
                                                    <td>{{$unit->code}}</td>
                                                    <td>{{$unit->description}}</td>
                                                    <td>{{$unit->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                                    <td>
                                                        <a href="{{route('edit.unit',['id'=>$unit->id])}}" class="btn btn-success btn-sm">
                                                            <span class="">Edit</span>
                                                        </a>
                                                        <a href="{{route('delete.unit',['id'=>$unit->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...')">
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

@extends('admin.master')

@section('title')
    Add Unit
@endsection


@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3 mx-auto">
                        <div class="card card-body">
                            <h4 class="text-center text-primary"> Add New Unit</h4>
                            <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                            <form action="{{route('create.unit')}}" class="form-horizontal" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row mb-3">
                                    <label for="unitName" class="col-3 col-form-label">Unit Name</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="unitName" name="name" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="unitCode" class="col-3 col-form-label">Unit Code</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="unitCode" name="code" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-3 col-form-label">Description</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="row col-12 mb-3">
                                    <label for="status" class="col-3 col-form-label">Status</label>
                                    <div class="col-9 mt-2">
                                        <div class="col-md-8">
                                            <label for=""><input type="radio" name="status" value="1"> Published </label>
                                            <label for=""><input type="radio" name="status" value="0" > Unpublished </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-content-end row">
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-primary w-50">Create Unit</button>
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

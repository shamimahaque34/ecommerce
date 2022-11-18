@extends('admin.master')

@section('title')
    Edit Color
@endsection


@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3 mx-auto">
                        <div class="card card-body">
                            <h4 class="text-center text-primary"> Edit Color</h4>
                            <span class="text-success text-center">{{Session::has('message') ? Session::get('message'):''}}</span>
                            <form action="{{route('update.color',['id'=>$color->id])}}" class="form-horizontal" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row mb-3">
                                    <label for="colorName" class="col-3 col-form-label">Color Name</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="colorName" value="{{$color->name}}" name="name" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="unitCode" class="col-3 col-form-label">Color Code</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="unitCode" value="{{$color->code}}" name="code" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-3 col-form-label">Description</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="description" name="description">{{$color->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row col-12 mb-3">
                                    <label for="status" class="col-3 col-form-label">Status</label>
                                    <div class="col-9 mt-2">
                                        <div class="col-md-8">
                                            <label for=""><input type="radio" name="status"{{$color->status == 1 ? 'checked' : ' '}} value="1"> Published </label>
                                            <label for=""><input type="radio" name="status"{{$color->status == 0 ? 'checked' : ' '}} value="0" > Unpublished </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-content-end row">
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-primary w-50">Update Color</button>
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

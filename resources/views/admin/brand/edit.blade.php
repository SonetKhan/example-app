@extends('admin.admin_master')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-header"> Update Brand</div>

                                <div class="card-body">

                                    <form action="{{url('brand/update/'.$editData->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="old_image" value="{{$editData->brand_image}}"
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Update Brand Name: </label>
                                            <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp"

                                                   value="{{$editData->brand_name}}">

                                            @error('brand_name')
                                            <span>{{$message}}</span>

                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Update Brand Image: </label>

                                            <input type="file" class="form-control" name="brand_image" id="exampleInputEmail1"
                                              value="{{$editData->brand_image}}"     aria-describedby="emailHelp" >

                                            @error('brand_image')

                                            <span>{{$message}}</span>

                                            @enderror
                                        </div>
                                        <div class="form-group">

                                            <img src="{{asset($editData->brand_image)}}" alt="" style="width:200px; height:200px"/>

                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Brand</button>
                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

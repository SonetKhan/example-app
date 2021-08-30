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

                                    <form action="{{url('home/about/update/'.$about->id)}}" method="POST" >
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Update about title: </label>
                                            <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp"

                                                   value="{{$about->title}}">

                                            @error('title')
                                            <span>{{$message}}</span>

                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">About short description</label>
                                            <textarea class="form-control" name="short_desc"  id="exampleFormControlTextarea1" rows="3" >{{$about->short_desc}}</textarea>
                                            @error('short_desc')

                                            <span>{{$message}}</span>

                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">About long description</label>
                                            <textarea class="form-control" name="long_desc" id="exampleFormControlTextarea1" rows="3">{{$about->long_desc}}</textarea>
                                            @error('long_desc')

                                            <span>{{$message}}</span>

                                            @enderror
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

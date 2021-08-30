@extends('admin.admin_master')

@section('content')



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Welcome to dashboard</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{session('success')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="card-header">All Brand:</div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL </th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Brand Image</th>
                                        <th scope="col">Created_at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $brand)
                                        <tr>
                                            <th scope="row">{{$brands->firstItem()+$loop->index}}</th>

                                            <td>{{$brand->brand_name}}</td>

                                            <td><img src="{{asset($brand->brand_image)}}" alt="" style="height:40px;width:70px"/></td>
                                            <td>
                                                @if($brand->created_at==NULL)
                                                    <span class="text-danger">Not found || not set </span>

                                                @else


                                                    {{Carbon\Carbon::parse($brand->created_at)->diffForHumans()}}

                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
                                                <a href="{{url('/brand/delete/'.$brand->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                                {{ $brands->links()  }}
                                {{--                                    {{ $categoriesData->onEachSide(5)->links() }}--}}
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card">

                                <div class="card-header"> Add Brand+</div>

                                <div class="card-body">
                                    <form action="{{route('add.brand')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand Name: </label>
                                            <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                            @error('brand_name')
                                            <span>{{$message}}</span>

                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand Image: </label>

                                            <input type="file" class="form-control" name="brand_image" id="exampleInputEmail1" aria-describedby="emailHelp" >

                                            @error('brand_image')

                                             <span>{{$message}}</span>

                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Brand</button>
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

@extends('admin.admin_master')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header"><a href="{{route('add.slider')}}"><button class="btn btn-info">Add slider+</button></a></div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" width="5%">SL</th>
                                    <th scope="col" width="15%">Title</th>
                                    <th scope="col" width="25%">Description</th>
                                    <th scope="col" width="15%">Image</th>
                                    <th scope="col" width="15%">Created_at</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php ($i=1)
                                @foreach($sliders as $slider)
                                <tr>
{{--                                    {{$sliders->firstItem()+$loop->index}}--}}
                                    <th scope="row">{{$i++}}</th>

                                    <td>{{$slider->title}}</td>

                                    <td>{{$slider->description}}</td>

                                    <td><img src="{{asset($slider->image)}}" height="100" width="100"/></td>

                                    <td>
                                        @if($slider->created_at==NULL)

                                            <span class="text-danger">Not found || not set </span>

                                        @else


{{--                                            {{Carbon\Carbon::parse($slider->created_at)->diffForHumans()}}--}}
                                            {{$slider->created_at}}

                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer"></div>
                    </div>

                </div>



        </div>

    </div>

@endsection

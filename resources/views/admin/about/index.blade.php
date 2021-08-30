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
                    <div class="card-header"><a href="{{route('add.about')}}"><button class="btn btn-info">Add About+</button></a></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">SL</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="25%">Short Description</th>
                                <th scope="col" width="15%">Long Description</th>
                                <th scope="col" width="15%">Created_at</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php ($i=1)
                            @foreach($homeAbouts as $about)
                                <tr>
                                    {{--                                    {{$sliders->firstItem()+$loop->index}}--}}
                                    <th scope="row">{{$i++}}</th>

                                    <td>{{$about->title}}</td>

                                    <td>{{$about->short_desc}}</td>

                                    <td>{{$about->long_desc}}</td>

                                    <td>
                                        @if($about->created_at==NULL)

                                            <span class="text-danger">Not found || not set </span>

                                        @else


                                            {{--                                            {{Carbon\Carbon::parse($slider->created_at)->diffForHumans()}}--}}
                                            {{$about->created_at}}

                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('home/about/edit/'.$about->id)}}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{url('home/about/delete/'.$about->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are sure you want to delete')">Delete</a>
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

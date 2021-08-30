@extends('admin.admin_master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-group">
                                @foreach($images as $image)
                                    <div class="col-md-4 mt-5">
                                        <div class="card">
                                            <img src="{{asset($image->image)}}" alt=""/>
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Multiple image</div>
                                 <div class="card-body">
                                    <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Multiple  Image: </label>

                                            <input type="file" class="form-control" name="image[]"
                                                   id="exampleInputEmail1" multiple=""
                                                   aria-describedby="emailHelp" >

                                            @error('image')

                                            <span>{{$message}}</span>

                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add image</button>
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

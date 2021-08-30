@extends('admin.admin_master')

@section('content')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create Slider</h2>
            </div>
            <div class="card-body">
                <form action="{{route('store.about')}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">About title</label>
                        <input type="text" class="form-control"  name="title" id="exampleFormControlInput1" placeholder="Enter Title">
                        @error('title')
                        <span>{{$message}}</span>

                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">About short description</label>
                        <textarea class="form-control" name="short_desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('short_desc')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">about long description</label>
                        <textarea class="form-control" name="long_desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('long_desc')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection

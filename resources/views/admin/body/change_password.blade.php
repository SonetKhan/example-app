@extends('admin.admin_master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h5 class="mb-5">Change Password : </h5>
                <form action="{{route('password.update')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        Current Password: <input type="password" name="current_password" id="current_password" placeholder="Current Password" class="form-control"/>
                        @error('current_password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        Change password: <input type="password" name="change_password" id="password" placeholder="Change Password" class="form-control" />
                        @error('change_password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                       Confirm Password:  <input type="password" name="confirm_password"  id="password_confirmation" placeholder="Confirm Password" class="form-control" />
                        @error('confirm_password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-success" value="Save" />
                </form>
         </div>
        </div>
    </div>
@endsection

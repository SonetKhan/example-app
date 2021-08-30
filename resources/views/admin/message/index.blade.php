@extends('admin.admin_master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Contact message:  <a href="{{route('add.contact')}}" class="btn btn-success">Add contact</a></div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">SL</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col" width="15%">Email</th>
                                <th scope="col" width="15%">Subject</th>
                                <th scope="col" width="15%">Message</th>
                                <th scope="col" width="15%">created_at</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($messages as $message)
                                <tr>
                                    <th scope="row">{{$i++}}</th>

                                    <td>{{$message->name}}</td>

                                    <td>{{$message->email}}</td>

                                    <td>{{$message->subject}}</td>

                                    <td>{{$message->message}}</td>

                                    <td>{{$message->created_at}}</td>
                                    <td>

                                        <a href="{{url('admin/message/delete/'.$message->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">Footer</div>
                </div>

            </div>

        </div>

    </div>

@endsection

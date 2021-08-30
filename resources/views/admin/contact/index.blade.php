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
                                <th scope="col" width="15%">Address</th>
                                <th scope="col" width="15%">Email</th>
                                <th scope="col" width="15%">Phone</th>
                                <th scope="col" width="15%">Created at</th>
                                <th scope="col" width="25%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($contactData as $contact)
                            <tr>
                                <th scope="row">{{$i++}}</th>

                                <td>{{$contact->address}}</td>

                                <td>{{$contact->email}}</td>

                                <td>{{$contact->phone}}</td>

                                <td>{{$contact->created_at}}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
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

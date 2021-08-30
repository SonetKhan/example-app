<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>All Category</b>
            <b style="float:right"></b>
        </h2>
    </x-slot>

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
                                <div class="card-header">All Category:</div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL </th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Created_at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categoriesData as $category)
                                        <tr>
                                            <th scope="row">{{$categoriesData->firstItem()+$loop->index}}</th>

                                            <td>{{$category->category_name}}</td>

                                            <td>{{$category->user->name}}</td>
{{--                                            <td>{{$category->name}}</td>--}}
                                            {{--                                <td>{{$user->created_at->diffForHumans()}}</td>--}}
                                            <td>
                                                @if($category->created_at==NULL)
                                                    <span class="text-danger">Not found || not set </span>

                                                @else

{{--                                                    {{$category->created_at->diffForHumans()}}--}}
                                                    {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}

                                                    @endif
                                            </td>
                                            <td>
                                                <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
                                                <a href="{{url('/category/softDelete/'.$category->id)}}" class="btn btn-danger">Remove</a>
                                            </td>

                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                {{ $categoriesData->links()  }}
{{--                                    {{ $categoriesData->onEachSide(5)->links() }}--}}
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card">

                                <div class="card-header"> Add Category+</div>

                                <div class="card-body">
                                    <form action="{{route('add.category')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category Name: </label>
                                            <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                            @error('category_name')
                                            <span>{{$message}}</span>

                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Category</button>
                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>

                </div>
            </div>

{{--            Trashed List:--}}




            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

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
                                <div class="card-header">All Category: Trashed List</div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL </th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Created_at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categoriesTrashed as $category)
                                        <tr>
                                            <th scope="row">{{$categoriesData->firstItem()+$loop->index}}</th>

                                            <td>{{$category->category_name}}</td>

                                            <td>{{$category->user->name}}</td>
                                            {{--                                            <td>{{$category->name}}</td>--}}
                                            {{--                                <td>{{$user->created_at->diffForHumans()}}</td>--}}
                                            <td>
                                                @if($category->created_at==NULL)
                                                    <span class="text-danger">Not found || not set </span>

                                                @else

                                                    {{--                                                    {{$category->created_at->diffForHumans()}}--}}
                                                    {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}

                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('category/restore/'.$category->id)}}" class="btn btn-info">Restore</a>
                                                <a href="{{url('category/permanentDelete/'.$category->id)}}" class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                                {{ $categoriesTrashed->links()  }}
                                {{--                                    {{ $categoriesData->onEachSide(5)->links() }}--}}
                            </div>

                        </div>
                        <div class="col-md-4">


                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
</x-app-layout>

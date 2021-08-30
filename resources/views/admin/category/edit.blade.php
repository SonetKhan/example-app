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

                                <div class="card-header"> Update Category</div>

                                <div class="card-body">
                                    <form action="{{url('category/update/'.$categoryData->id)}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Update Category Name: </label>
                                            <input type="text" class="form-control" name="category_name" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp"

                                                   value="{{$categoryData->category_name}}">

                                            @error('category_name')
                                            <span>{{$message}}</span>

                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Category</button>
                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

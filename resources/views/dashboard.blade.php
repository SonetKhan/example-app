<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          HI........  {{Auth::user()->name}}
            <b style="float:right">Total Users:<span class="badge badge-danger">{{count($users)}}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <h1>Welcome to dashboard</h1>
                <div class="container">
                    <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL </th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
{{--                                <td>{{$user->created_at->diffForHumans()}}</td>--}}
                                <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

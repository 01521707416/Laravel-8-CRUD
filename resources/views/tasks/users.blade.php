@extends('template.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        {{-- Fontawesome Link --}}
        <script src="https://kit.fontawesome.com/91662dfc40.js" crossorigin="anonymous"></script>
        <title>Users List</title>
        
    </head>

    <body>
        {{-- User Table starts --}}
    <div class="row m-4">
        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header bg-info shadow">
                    <h3 class="text-white">Users List
                        <span class="badge badge-pill badge-primary shadow-lg mx-5">Total Users: {{$total_users}}</span>
                    </h3>
                </div>
                @if(session('user_delete'))
                <strong class="text-success m-3">{{session('user_delete')}}</strong>
                @endif
                @if(session('success'))
                <strong class="text-success m-3">{{session('success')}}</strong>
                @endif
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_users as $key=> $user)   
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                            <td>
                                <div class="text-center">
                                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-outline-primary shadow btn-xs mr-1"><i class="fa-solid fa-edit"></i></a>

                                    <a href="{{route('user.delete', $user->id)}}" class="btn btn-outline-danger shadow btn-xs ml-1"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        {{-- User Table ends --}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>
@endsection
@extends('template.master')
@section('content')

<div class="container">
    <div class="row m-4">
        {{-- Name change section starts --}}
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Update User Profile</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('user.update', $user->id)}}" method="POST">
                        @csrf
                        <div class="form-group col-lg-6">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="form-label">Current Password</label>
                            <input type="text" class="form-control" name="old_pass" value="">
                            @if(session('wrong_pass'))
                            <strong class="text-danger pt-2">{{session('wrong_pass')}}</strong>
                            @endif
                            @if(session('same_pass'))
                            <strong class="text-danger pt-2">{{session('same_pass')}}</strong>
                            @endif
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="form-label">New Password</label>
                            <input type="text" class="form-control" name="new_pass" value="">
                        </div>
                        <div class="form-group col-lg-6">
                            <button class="btn btn-success btn-sm shadow" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
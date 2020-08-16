@extends('home')
@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($User)?'Edit User':'Add User'}}</h2>
    </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <ul>
                <li>
                    {{$error}}
                </li>

            </ul>
            @endforeach
        </div>
        @endif
        <form action="{{isset($user) ? route('admin.users.update',$user->id) : route('admin.users.store')}}" method="Post">
            @csrf
            @if(isset($user))
            @method('PUT')

            @endif

            <div class="form-group">
                <label>User Name:</label>
                <input type="text" name="name" class="form-control" value="{{isset($user)?$user->name:''}}" placeholder="User Name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{isset($user)?$user->email:''}}" placeholder="Enter Email....... ">
            </div>
            <div class="form-group">
                <label>role</label>
                <input type="text" name="role" class="form-control" value="{{isset($user)?$user->role:''}}" placeholder="Enter Role....... ">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="Password" name="password" class="form-control" value="" placeholder="Enter Password....... ">
            </div>
            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($user)?'Update':'Puplish'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

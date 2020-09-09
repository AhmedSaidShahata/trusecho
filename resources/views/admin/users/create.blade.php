@extends('home')
@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($user) ? __('messages.edit_user') : __('messages.add_user')  }}</h2>
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
                <label>{{__('messages.user_name')}}</label>
                <input type="text" name="name" class="form-control" value="{{isset($user)?$user->name:''}}" placeholder="">
            </div>
            <div class="form-group">
                <label>{{__('messages.email')}}</label>
                <input type="text" name="email" class="form-control" value="{{isset($user)?$user->email:''}}" placeholder="">
            </div>
            <div class="form-group">
                <label>{{__('messages.role')}}</label>
                <input type="text" name="role" class="form-control" value="{{isset($user)?$user->role:''}}" placeholder=" ">
            </div>
            <div class="form-group">
                <label>{{__('messages.password')}}</label>
                <input type="Password" name="password" class="form-control" value="" placeholder="">
            </div>
            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($user)? __('messages.update') : __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

@extends('home')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<a href="{{route('admin.users.create')}}" class="mt-2 btn btn-primary form-control">Add User</a>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th>Controls</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user )
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td class="d-flex">
                <a href="{{route('admin.users.edit',$user->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                <form method="POST" class="form-inline" action="{{route('admin.users.destroy',$user->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
        @empty
        <div class="alert alert-primary" role="alert">
            No users Yet
        </div>
        @endforelse
    </tbody>
</table>
@endsection

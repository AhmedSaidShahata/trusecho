@extends('home')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<a href="{{route('admin.users.create')}}" class="mt-2 btn btn-primary form-control">

    {{__('messages.add_user')}}
</a>
<div style="overflow-x: scroll;">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.user_name')}}</th>
                <th scope="col">{{__('messages.email')}}</th>
                <th scope="col">{{__('messages.role')}}</th>
                <th>{{__('messages.controls')}}</th>
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
                {{__('messages.no_user')}}
            </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{__('messages.read_msg')}} {{$contact->fullname}}</h2>
    </div>
    <div class="card-body">
    <ul class="list-group">
        <li class="list-group-item">
            {{__('messages.email')}}
        </li>
        <li class="list-group-item">
            {{$contact->email}}
        </li>

        <li class="list-group-item">
        {{__('messages.message')}}
        </li>
        <li class="list-group-item">
            {{$contact->message}}
        </li>
    </ul>
        <a href="{{route('admin.contacts.index')}}" class="form-control btn btn-primary">
        {{__('messages.back')}}
        </a>
    </div>
</div>


@endsection

@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>Read Message From {{$contact->fullname}}</h2>
    </div>
    <div class="card-body">
    <ul class="list-group">
        <li class="list-group-item">
            Email
        </li>
        <li class="list-group-item">
            {{$contact->email}}
        </li>

        <li class="list-group-item">
            Message
        </li>
        <li class="list-group-item">
            {{$contact->message}}
        </li>
    </ul>
        <a href="{{route('admin.contacts.index')}}" class="form-control btn btn-primary">Back</a>
    </div>
</div>


@endsection

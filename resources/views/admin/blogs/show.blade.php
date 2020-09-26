@extends('home')

@section('content')


<div class="card show">

    <div class="card-header">
        <h2>{{$blog->title}}</h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                {{__('messages.writer')}}
            </li>
            <li class="list-group-item">
                {{$blog->user->name}}
            </li>

            <li class="list-group-item">
                {{__('messages.description')}}
            </li>
            <li class="list-group-item">
                {{$blog->description}}
            </li>

            <li class="list-group-item">
                {{__('messages.content')}}
            </li>
            <li class="list-group-item">
                {{$blog->content}}
            </li>


            <li class="list-group-item">
                {{__('messages.picture')}}
            </li>
            <li class="list-group-item">
                <img src="{{asset('storage/'.$blog->picture)}}" alt="image blog" style="width:100px;height:100px">
            </li>

        </ul>
        <a href="{{route('admin.contacts.index')}}" class="form-control btn btn-primary">
            {{__('messages.back')}}
        </a>
    </div>
</div>


@endsection

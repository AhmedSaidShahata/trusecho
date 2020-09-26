@extends('home')

@section('content')


<div class="card show">

    <div class="card-header">
        <h2> {{$newsorg->title }} </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                {{__('messages.organization')}}
            </li>
            <li class="list-group-item">
                {{$newsorg->organization->name}}
            </li>

            <li class="list-group-item">
                {{__('messages.title')}}
            </li>
            <li class="list-group-item">
                {{$newsorg->title}}
            </li>

            <li class="list-group-item">
                {{__('messages.description')}}
            </li>
            <li class="list-group-item">
                {{$newsorg->description}}
            </li>


            <li class="list-group-item">
                {{__('messages.deadline')}}
            </li>
            <li class="list-group-item">
                {{$newsorg->deadline}}
            </li>

            <li class="list-group-item">
                {{__('messages.picture')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$newsorg->picture)}}" alt="image job" style="width:100px;height:100px">
            </li>



        </ul>
        <a href="{{route('admin.newsorgs.index')}}" class="form-control btn btn-primary">{{__('messages.back')}}</a>
    </div>
</div>


@endsection

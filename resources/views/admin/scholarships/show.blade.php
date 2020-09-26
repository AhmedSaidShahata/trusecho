@extends('home')

@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card show">

    <div class="card-header">
        <h2>{{$scholarship->title }} </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">

            <li class="list-group-item">
                {{__('messages.description')}}
            </li>
            <li class="list-group-item">
                {{$scholarship->description}}
            </li>


            <li class="list-group-item">
                {{__('messages.location')}}
            </li>
            <li class="list-group-item">
                {{$scholarship->location}}
            </li>

            <li class="list-group-item">
                {{__('messages.requirments')}}
            </li>
            <li class="list-group-item">
                {{$scholarship->requirments}}
            </li>

            <li class="list-group-item">
                {{__('messages.email')}}
            </li>
            <li class="list-group-item">
                {{$scholarship->email}}
            </li>


            <li class="list-group-item">
                {{__('messages.deadline')}}
            </li>
            <li class="list-group-item">
                {{$scholarship->deadline}}
            </li>

            <li class="list-group-item">
                {{__('messages.creator')}}
            </li>
            <li class="list-group-item">
                {{$scholarship->user->name}}
            </li>

            <li class="list-group-item">
                {{__('messages.cost')}}
            </li>
            <li class="list-group-item">
                {{$scholarship->cost->name}}
            </li>

            <li class="list-group-item">
                {{__('messages.specialization')}}
            </li>
            <li class="list-group-item">
                {{$scholarship->specialization->name}}
            </li>

            <li class="list-group-item">
                {{__('messages.picture')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$scholarship->picture)}}" alt="image scholarship" style="width:100px;height:100px">
            </li>

        </ul>
        <a href="{{route('admin.scholarships.index')}}" class="form-control btn btn-primary">{{__('messages.back')}}</a>
    </div>
</div>


@endsection

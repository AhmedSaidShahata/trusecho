@extends('home')

@section('content')


<div class="card show">

    <div class="card-header">
        <h2> {{$service->title }} </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                {{__('messages.description')}}
            </li>
            <li class="list-group-item">
                {{$service->description}}
            </li>

            <li class="list-group-item">
                {{__('messages.instruction_buyer')}}
            </li>
            <li class="list-group-item">
                {{$service->content}}
            </li>

            <li class="list-group-item">
                {{__('messages.deliver_time')}}
            </li>
            <li class="list-group-item">
                {{$service->delivery_time}}
            </li>


            <li class="list-group-item">
                {{__('messages.price')}}
            </li>
            <li class="list-group-item">
                {{$service->price}}
            </li>


            <li class="list-group-item">
                {{__('messages.type')}}
            </li>
            <li class="list-group-item">
                {{$service->type->name}}
            </li>


            <li class="list-group-item">
                {{__('messages.creator')}}
            </li>
            <li class="list-group-item">
                {{$service->user->name}}
            </li>

            <li class="list-group-item">
                {{__('messages.picture')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$service->picture)}}" alt="image job" style="width:100px;height:100px">
            </li>
        </ul>
        <a href="{{route('admin.services.index')}}" class="form-control btn btn-primary">{{__('messages.back')}}</a>
    </div>
</div>


@endsection

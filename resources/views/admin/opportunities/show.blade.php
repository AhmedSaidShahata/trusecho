@extends('home')

@section('content')


<div class="card show">

    <div class="card-header">
        <h2>{{$opportunity->title}} </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
        
            <li class="list-group-item">
                {{__('messages.creator')}}
            </li>
            <li class="list-group-item">
                {{$opportunity->user->name}}
            </li>


            <li class="list-group-item">
                {{__('messages.description')}}
            </li>
            <li class="list-group-item">
                {{$opportunity->description}}
            </li>


            <li class="list-group-item">
                {{__('messages.content')}}
            </li>
            <li class="list-group-item">
                {{$opportunity->content}}
            </li>


            <li class="list-group-item">
                {{__('messages.location')}}
            </li>
            <li class="list-group-item">
                {{$opportunity->location}}
            </li>


            <li class="list-group-item">
                {{__('messages.requirments')}}
            </li>
            <li class="list-group-item">
                {{$opportunity->requirments}}
            </li>

            <li class="list-group-item">
                {{__('messages.email')}}
            </li>
            <li class="list-group-item">
                {{$opportunity->email}}
            </li>


            <li class="list-group-item">
                {{__('messages.deadline')}}
            </li>
            <li class="list-group-item">
                {{$opportunity->deadline}}
            </li>


            <li class="list-group-item">
                <img src="{{asset('storage/'.$opportunity->picture)}}" alt="image opportunity" style="width:100px;height:100px">
            </li>

        </ul>
        <a href="{{route('admin.opportunitys.index')}}" class="form-control btn btn-primary">{{__('messages.back')}}</a>
    </div>
</div>


@endsection

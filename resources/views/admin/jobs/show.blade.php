@extends('home')

@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card show">

    <div class="card-header">
        <h2>{{$job->title }} </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">

            <li class="list-group-item">
                {{__('messages.description')}}
            </li>
            <li class="list-group-item">
                {{$job->description}}
            </li>


            <li class="list-group-item">
                {{__('messages.location')}}
            </li>
            <li class="list-group-item">
                {{$job->location}}
            </li>

            <li class="list-group-item">
                {{__('messages.requirments')}}
            </li>
            <li class="list-group-item">
                {{$job->requirments}}
            </li>

            <li class="list-group-item">
                {{__('messages.salary')}}
            </li>
            <li class="list-group-item">
                {{$job->salary}}
            </li>

            <li class="list-group-item">
                {{__('messages.name_company')}}
            </li>
            <li class="list-group-item">
                {{$job->company}}
            </li>


            <li class="list-group-item">
                {{__('messages.email')}}
            </li>
            <li class="list-group-item">
                {{$job->email}}
            </li>


            <li class="list-group-item">
                {{__('messages.deadline')}}
            </li>
            <li class="list-group-item">
                {{$job->deadline}}
            </li>


            <li class="list-group-item">
                {{__('messages.picture')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$job->picture)}}" alt="image job" style="width:100px;height:100px">
            </li>


            <li class="list-group-item">
                {{__('messages.picture_company')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$job->picture_company)}}" alt="image job" style="width:100px;height:100px">
            </li>


        </ul>
        <a href="{{route('admin.jobs.index')}}" class="form-control btn btn-primary">{{__('messages.back')}}</a>
    </div>
</div>


@endsection

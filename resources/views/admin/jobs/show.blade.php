@extends('home')

@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">

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
                {{__('messages.content')}}
            </li>
            <li class="list-group-item">
                {{$job->content}}
            </li>

            <li class="list-group-item">
                {{__('messages.head_det')}}
            </li>
            <li class="list-group-item">
                {{$job->heading_details}}
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
                {{__('messages.company_name')}}
            </li>
            <li class="list-group-item">
                {{$job->company}}
            </li>

            <li class="list-group-item">
                {{__('messages.location')}}
            </li>
            <li class="list-group-item">
                {{$job->location_ar}}
            </li>

            <li class="list-group-item">
                {{__('messages.requirments')}}
            </li>
            <li class="list-group-item">
                {{$job->requirments_ar}}
            </li>
            <p class="text-center p-2 mt-4" style="background:burlywood">{{__('messages.other_inf')}}</p>

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
                <img src="{{asset('storage/'.$job->picture)}}" alt="image job" style="width:100px;height:100px">
            </li>



        </ul>
        <a href="{{route('admin.jobs.index')}}" class="form-control btn btn-primary">{{__('messages.back')}}</a>
    </div>
</div>


@endsection

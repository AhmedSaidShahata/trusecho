@extends('home')

@section('content')


<div class="card show">

    <div class="card-header">
        <h2>{{__('messages.job')}}
             {{! $job=App\Job::find($jobapp->job_id) }}
            {{$job->title}}
        </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                {{__('messages.email')}}
            </li>
            <li class="list-group-item">
                {{$jobapp->email}}
            </li>
            <li class="list-group-item">
                {{__('messages.phone')}}
            </li>
            <li class="list-group-item">
                {{$jobapp->phone}}
            </li>
            <li class="list-group-item">
                {{__('messages.cv')}}
            </li>
            <li class="list-group-item">
                <a href="{{asset('files/'.$jobapp->cv)}}" download="">{{$jobapp->fullname}} cv</a>
            </li>

            <li class="list-group-item">
                {{__('messages.message')}}
            </li>
            <li class="list-group-item">
                {{$jobapp->message}}
            </li>
        </ul>
        <a href="{{route('admin.jobapps.index')}}" class="form-control btn btn-primary">
            {{__('messages.back')}}
        </a>
    </div>
</div>


@endsection

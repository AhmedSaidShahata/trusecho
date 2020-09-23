@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{__('messages.report_service')}}

        </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                {{__('messages.user_report')}}
            </li>
            <li class="list-group-item">
                {{$service_report->user->name}}
            </li>

            <li class="list-group-item">
                {{__('messages.service_name')}}
            </li>
            <li class="list-group-item">
                {{$service_report->service->title}}
            </li>

            <li class="list-group-item">
                {{__('messages.description_report')}}
            </li>
            <li class="list-group-item">
                {{$service_report->description}}
            </li>

            <li class="list-group-item">
                {{__('messages.report_date')}}
            </li>
            <li class="list-group-item">
                {{$service_report->created_at}}
            </li>


        </ul>
        <a href="{{route('admin.reportservices.index')}}" class="form-control btn btn-primary">
            {{__('messages.back')}}
        </a>
    </div>
</div>


@endsection

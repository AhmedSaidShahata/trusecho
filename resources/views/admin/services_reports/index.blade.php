@extends('home')

@section('content')

<div style="overflow-x:auto ;">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.user_report')}}</th>
                <th scope="col">{{__('messages.service_name')}}</th>
                <th scope="col">{{__('messages.description_report')}}</th>
                <th scope="col">{{__('messages.watch')}}</th>
                <th scope="col">{{__('messages.report_date')}}</th>
                <th scope="col">{{__('messages.controls')}}</th>

            </tr>
        </thead>
        <tbody>
            @forelse($service_reports as $service_report)
            <tr class="{{ $service_report->seen == 0 ? 'bg-red': ''}} ">
                <th scope="row">{{$service_report->id}}</th>
                <td>{{$service_report->user->name}}</td>
                <td>{{$service_report->service->title}}</td>
                <td>{{$service_report->description}}</td>
                <td>
                    {{$service_report->seen==1 ? __('messages.watched') : __('messages.not_watched') }}

                </td>
                <td>{{$service_report->created_at}}</td>

                <td class="d-flex">
                    <a href="{{route('admin.reportservices.show',$service_report->id)}}" class="btn"> <i class="far fa-eye"></i></a>
                    <form method="POST" class="form-inline" action="{{route('admin.reportservices.destroy',$service_report->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                {{__('messages.no_service_report')}}
            </div>

            @endforelse

        </tbody>
    </table>
</div>



@endsection

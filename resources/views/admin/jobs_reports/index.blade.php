@extends('home')

@section('content')


<div style="overflow-x:auto ;">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.user_report')}}</th>
                <th scope="col">{{__('messages.job_name')}}</th>
                <th scope="col">{{__('messages.description_report')}}</th>
                <th scope="col">{{__('messages.watch')}}</th>
                <th scope="col">{{__('messages.report_date')}}</th>
                <th scope="col">{{__('messages.controls')}}</th>

            </tr>
        </thead>
        <tbody>
            @forelse($job_reports as $job_report)
            <tr class="{{ $job_report->seen == 0 ? 'bg-red': ''}} ">
                <th scope="row">{{$job_report->id}}</th>
                <td>{{$job_report->user->name}}</td>
                <td>{{$job_report->job->title}}</td>
                <td>

                    {{ substr($job_report->requirments,0,20) }}
                </td>
                <td>
                    {{$job_report->seen==1 ? __('messages.watched') : __('messages.not_watched') }}

                </td>
                <td>{{$job_report->created_at}}</td>

                <td class="d-flex">
                    <a href="{{route('admin.reportjobs.show',$job_report->id)}}" class="btn"> <i class="far fa-eye"></i></a>
                    <form method="POST" class="form-inline" action="{{route('admin.reportjobs.destroy',$job_report->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-primary">
                {{__('messages.no_job_report')}}
            </div>

            @endforelse

        </tbody>
    </table>
    {{$job_reports->links()}}
</div>




@endsection

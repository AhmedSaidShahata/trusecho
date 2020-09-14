@extends('home')

@section('content')




@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif



<div style="overflow-x: auto;">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.job')}}</th>
                <th scope="col">{{__('messages.full_name')}}</th>
                <th scope="col">{{__('messages.email')}}</th>
                <th scope="col">{{__('messages.phone_number')}}</th>
                <th scope="col">{{__('messages.message')}}</th>
                <th scope="col">{{__('messages.cv')}}</th>
                <th scope="col">{{__('messages.watch')}}</th>
                <th scope="col">{{__('messages.apply_date')}}</th>
                <th scope="col">{{__('messages.controls')}}</th>

            </tr>
        </thead>
        <tbody>
            @forelse($jobapps as $jobapp)
            <tr class="{{ $jobapp->seen == 0 ? 'bg-red': ''}} ">
                <th scope="row">{{$jobapp->id}}</th>
                <td>
               {{! $job=App\Job::find($jobapp->job_id) }}
                {{$job->title}}
                </td>
                <td>{{$jobapp->fullname}}</td>
                <td>{{$jobapp->email}}</td>
                <td>{{$jobapp->phone}}</td>
                <td>
                {{ substr($jobapp->message,0,20) }}

                </td>

                <td>
                    <a href="{{asset('files/'.$jobapp->cv)}}" download="">{{$jobapp->fullname}} cv</a>
                </td>
                <td>
                    {{$jobapp->seen==1 ? __('messages.watched') : __('messages.not_watched') }}

                </td>

                <td>{{$jobapp->created_at}}</td>

                <td class="d-flex">

                <a href="{{route('admin.jobapps.show',$jobapp->id)}}" class="btn"> <i class="far fa-eye"></i></a>

                    <form method="POST" class="form-inline" action="{{route('admin.jobapps.destroy',$jobapp->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                {{__('messages.no_job_app')}}
            </div>

            @endforelse

        </tbody>
    </table>
</div>




@endsection

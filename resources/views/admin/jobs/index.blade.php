@extends('home')
@section('content')


{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success">
    {{ $lang == 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif


<a href="{{route('admin.jobs.create')}}" class="mt-2 btn btn-primary form-control">{{__('messages.add_job')}}</a>
<div style="overflow-x:auto ;">
    <table class="table table-dark">

        <thead>


            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.picture')}}</th>
                <th scope="col">{{__('messages.picture_company')}}</th>
                <th scope="col">{{__('messages.title')}}</th>
                <th scope="col">{{__('messages.description')}}</th>
                <th scope="col">{{__('messages.salary')}}</th>
                <th scope="col">{{__('messages.company')}}</th>
                <th scope="col">{{__('messages.location')}}</th>
                <th scope="col">{{__('messages.requirments')}}</th>
                <th scope="col">{{__('messages.deadline')}}</th>
                <th scope="col">{{__('messages.email')}}</th>
                <th scope="col">{{__('messages.contact')}}</th>
                <th scope="col">{{__('messages.creator')}}</th>
                <th scope="col">{{__('messages.specialization')}}</th>
                <th>{{__('messages.controls')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jobs as $job )
            <tr>
                <th scope="row">{{$job->id}}</th>
                <td><img src="{{asset('storage/'.$job->picture)}}" alt="image job" style="width:100px;height:100px"></td>
                <td><img src="{{asset('storage/'.$job->picture_company)}}" alt="image job" style="width:100px;height:100px"></td>
                <td>{{$job->title}}</td>
                <td>
                    {{ substr($job->description,0,20) }}
                </td>
                <td>{{$job->salary}}</td>
                <td>{{$job->company}}</td>


                <td>
                    {{ substr($job->location,0,20) }}
                </td>
                <td>
                    {{ substr($job->requirments,0,20) }}
                </td>

                <td>{{$job->deadline}}</td>
                <td>{{$job->email}}</td>
                <td>{{$job->contact}}</td>
                <td>{{$job->user->name}}</td>
                <td>{{$job->specialization->name}}</td>

                <td class="d-flex">
                    <div hidden>{{!$best_job=App\Bestjob::where('job_id', '=',$job->id)->count()}}</div>
                    <input {{$best_job > 0 ? 'checked' : ''}} type="checkbox" data-jobid="{{$job->id}}" class="best-job btn btn-primary">
                    <a href="{{route('admin.jobs.show',$job->id)}}" class="btn"> <i class="far fa-eye"></i></a>
                    <a href="{{route('admin.jobs.edit',$job->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                    <form method="POST" class="form-inline" action="{{route('admin.jobs.destroy',$job->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn "><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>

            </tr>
            @empty
            <div class="alert alert-primary" role="alert">
                {{__('messages.no_jobs')}}
            </div>
            @endforelse
        </tbody>
    </table>
    {{$jobs->links()}}
</div>
@endsection

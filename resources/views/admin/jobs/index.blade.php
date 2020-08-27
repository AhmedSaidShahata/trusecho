@extends('home')
@section('content')
<a href="{{route('admin.jobs.create')}}" class="mt-2 btn btn-primary form-control">Add job</a>
<div style="overflow-x:auto ;">
    <table class="table table-dark">

        <thead>


            <tr>
                <th scope="col">id</th>
                <th scope="cpl">image</th>
                <th scope="col">Title English</th>
                <th scope="col">Description English</th>
                <th scope="col">Content English</th>
                <th scope="col">heading details English</th>
                <th scope="col">location English</th>
                <th scope="col">requirments English</th>
                <th scope="col">Title Arabic</th>
                <th scope="col">Description Arabic</th>
                <th scope="col">Content Arabic</th>
                <th scope="col">heading details Arabic</th>
                <th scope="col">location Arabic</th>
                <th scope="col">requirments Arabic</th>
                <th scope="col">Deadline</th>
                <th scope="col">Email</th>
                <th>Controls</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jobs as $job )
            <tr>
                <th scope="row">{{$job->id}}</th>
                <td><img src="{{asset('storage/'.$job->picture)}}" alt="image job" style="width:100px;height:100px"></td>
                <td>{{$job->title_en}}</td>
                <td>
                    {{ substr($job->description_en,0,20) }}....
                </td>
                <td>
                    {{ substr($job->content_en,0,20) }}....
                </td>
                <td>
                    {{ substr($job->heading_details_en,0,20) }}....
                </td>
                <td>
                    {{ substr($job->location_en,0,20) }}....
                </td>
                <td>
                    {{ substr($job->requirments_en,0,20) }}....
                </td>
                <td>{{$job->title_ar}}</td>
                <td>
                    {{ substr($job->description_ar,0,20) }}....
                </td>
                <td>
                    {{ substr($job->content_ar,0,20) }}....
                </td>
                <td>
                    {{ substr($job->heading_details_ar,0,20) }}....
                </td>
                <td>
                    {{ substr($job->location_ar,0,20) }}....
                </td>
                <td>
                    {{ substr($job->requirments_ar,0,20) }}....
                <td>{{$job->deadline}}</td>
                <td>{{$job->email}}</td>
                <td class="d-flex">
                <div hidden>{{!$best_job=App\Bestjob::where('job_id', '=',$job->id)->count()}}</div>
                    <button data-jobid="{{$job->id}}" class="best-job btn btn-primary"> {{$best_job > 0 ? 'UnBest' : 'Best'}} </button>
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
                No jobs Yet
            </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

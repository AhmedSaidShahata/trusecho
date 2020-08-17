@extends('home')
@section('content')
<a href="http://127.0.0.1:8000/admin/jobs/create" class="mt-2 btn btn-primary form-control">Add job</a>
<div style="overflow-x:auto ;">
    <table class="table table-dark">

        <thead>


            <tr>
                <th scope="col">id</th>
                <th scope="cpl">image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Content</th>
                <th scope="col">Heading Details</th>
                <th scope="col">Location</th>
                <th scope="col">Deadline</th>
                <th scope="col">Email</th>
                <th scope="col">Requirements</th>
                <th>Controls</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jobs as $job )
            <tr>
                <th scope="row">{{$job->id}}</th>
                <td><img src="{{asset('storage/'.$job->picture)}}" alt="image job" style="width:100px;height:100px"></td>
                <td>{{$job->title}}</td>
                <td>{{$job->description}}</td>
                <td>{{$job->content}}</td>
                <td>{{$job->heading_details}}</td>
                <td>{{$job->location}}</td>
                <td>{{$job->deadline}}</td>
                <td>{{$job->email}}</td>
                <td>{{$job->requirments}}</td>

                <td class="d-flex">

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

@extends('home')
@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($job)?'Edit job':'Add job'}}</h2>
    </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <ul>
                <li>
                    {{$error}}
                </li>

            </ul>
            @endforeach
        </div>
        @endif
        <form action="{{isset($job) ? route('admin.jobs.update',$job->id) : route('admin.jobs.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($job))
            @method('PUT')

            @endif

            <div class="form-group">
                <label for="category">Job Title:</label>
                <input type="text" name="title" class="form-control" value="{{isset($job)?$job->title:''}}" placeholder="Add a new job">
            </div>
            <div class="form-group">
                <label for="category">Job Description</label>
                <input type="text" name="description" class="form-control" value="{{isset($job)?$job->description:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="category">Job Location</label>
                <input type="text" name="location" class="form-control" value="{{isset($job)?$job->location:''}}" placeholder="Add a location">
            </div>
            <div class="form-group">
                <label for="category">Email</label>
                <input type="text" name="email" class="form-control" value="{{isset($job)?$job->description:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="category">Deadline</label>
                <input type="date" name="deadline" class="form-control" value="{{isset($job)?$job->deadline:''}}">
            </div>
            <div class="form-group">
                <label for="category">Heading Details</label>
                <input type="text" name="heading_details" class="form-control" value="{{isset($job)?$job->heading_details:''}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">content</label>
                <textarea class="form-control" name="content" id="" cols="50" rows="10">{{isset($job) ? $job->content : ''}}</textarea>

                @if(isset($job))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$job->picture}}" alt="{{$job->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Requirements</label>
                <textarea class="form-control" name="requirments" id="" cols="50" rows="10" placeholder="Enter Requirments with seoerated dashed">{{isset($job) ? $job->requirments : ''}}</textarea>
            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($job)?'Update':'Puplish'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

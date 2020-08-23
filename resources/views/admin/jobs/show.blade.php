@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>job {{$job->title_en}} / {{$job->title_ar}} </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">

            <!----------------------------------------- Arabic----------------------------------------->
            <p class="text-center p-2" style="background:burlywood">job English </p>
            <li class="list-group-item">
                Description
            </li>
            <li class="list-group-item">
                {{$job->description_en}}
            </li>


            <li class="list-group-item">
                Content
            </li>
            <li class="list-group-item">
                {{$job->content_en}}
            </li>


            <li class="list-group-item">
                Heading Details
            </li>
            <li class="list-group-item">
                {{$job->heading_details_en}}
            </li>


            <li class="list-group-item">
                location
            </li>
            <li class="list-group-item">
                {{$job->location_en}}
            </li>



            <li class="list-group-item">
                requirments
            </li>
            <li class="list-group-item">
                {{$job->requirments_en}}
            </li>
            <!----------------------------------------- English ----------------------------------------->
            <p class="text-center p-2 mt-4" style="background:burlywood">job Arabic </p>

            <li class="list-group-item">
                Description
            </li>
            <li class="list-group-item">
                {{$job->description_ar}}
            </li>
            <li class="list-group-item">
                Content
            </li>
            <li class="list-group-item">
                {{$job->content_ar}}
            </li>

            <li class="list-group-item">
                Heading Details
            </li>
            <li class="list-group-item">
                {{$job->heading_details_ar}}
            </li>

            <li class="list-group-item">
                location
            </li>
            <li class="list-group-item">
                {{$job->location_ar}}
            </li>

            <li class="list-group-item">
                requirments
            </li>
            <li class="list-group-item">
                {{$job->requirments_ar}}
            </li>
            <p class="text-center p-2 mt-4" style="background:burlywood">Other </p>

            <li class="list-group-item">
                Email
            </li>
            <li class="list-group-item">
                {{$job->email}}
            </li>


            <li class="list-group-item">
                Deadline
            </li>
            <li class="list-group-item">
                {{$job->deadline}}
            </li>


            <li class="list-group-item">
                <img src="{{asset('storage/'.$job->picture)}}" alt="image job" style="width:100px;height:100px">
            </li>



        </ul>
        <a href="{{route('admin.jobs.index')}}" class="form-control btn btn-primary">Back</a>
    </div>
</div>


@endsection

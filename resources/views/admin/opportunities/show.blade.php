@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>opportunity {{$opportunity->title_en}} / {{$opportunity->title_ar}} </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">

            <!----------------------------------------- Arabic----------------------------------------->
            <p class="text-center p-2" style="background:burlywood">opportunity English </p>
            <li class="list-group-item">
                Description
            </li>
            <li class="list-group-item">
                {{$opportunity->description_en}}
            </li>


            <li class="list-group-item">
                Content
            </li>
            <li class="list-group-item">
                {{$opportunity->content_en}}
            </li>


            <li class="list-group-item">
                Heading Details
            </li>
            <li class="list-group-item">
                {{$opportunity->heading_details_en}}
            </li>


            <li class="list-group-item">
                location
            </li>
            <li class="list-group-item">
                {{$opportunity->location_en}}
            </li>



            <li class="list-group-item">
                requirments
            </li>
            <li class="list-group-item">
                {{$opportunity->requirments_en}}
            </li>
            <!----------------------------------------- English ----------------------------------------->
            <p class="text-center p-2 mt-4" style="background:burlywood">opportunity Arabic </p>

            <li class="list-group-item">
                Description
            </li>
            <li class="list-group-item">
                {{$opportunity->description_ar}}
            </li>
            <li class="list-group-item">
                Content
            </li>
            <li class="list-group-item">
                {{$opportunity->content_ar}}
            </li>

            <li class="list-group-item">
                Heading Details
            </li>
            <li class="list-group-item">
                {{$opportunity->heading_details_ar}}
            </li>

            <li class="list-group-item">
                location
            </li>
            <li class="list-group-item">
                {{$opportunity->location_ar}}
            </li>

            <li class="list-group-item">
                requirments
            </li>
            <li class="list-group-item">
                {{$opportunity->requirments_ar}}
            </li>
            <p class="text-center p-2 mt-4" style="background:burlywood">Other </p>

            <li class="list-group-item">
                Email
            </li>
            <li class="list-group-item">
                {{$opportunity->email}}
            </li>


            <li class="list-group-item">
                Deadline
            </li>
            <li class="list-group-item">
                {{$opportunity->deadline}}
            </li>


            <li class="list-group-item">
                <img src="{{asset('storage/'.$opportunity->picture)}}" alt="image opportunity" style="width:100px;height:100px">
            </li>



        </ul>
        <a href="{{route('admin.opportunitys.index')}}" class="form-control btn btn-primary">Back</a>
    </div>
</div>


@endsection

@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>Organization {{$organization->name_en}} / {{$organization->name_ar}} </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                Email
            </li>
            <li class="list-group-item">
                {{$organization->email}}
            </li>

            <li class="list-group-item">
                Whats App
            </li>
            <li class="list-group-item">
                {{$organization->whatsapp}}

            </li>


            <li class="list-group-item">
                Description English
            </li>
            <li class="list-group-item">
                {{$organization->description_en}}
            </li>

            <li class="list-group-item">
                 Description Arabic
            </li>
            <li class="list-group-item">
                {{$organization->description_ar}}
            </li>
            <li class="list-group-item">
                 About Eglish
            </li>
            <li class="list-group-item">
                {{$organization->about_en}}
            </li>

            <li class="list-group-item">
                 About Arabic
            </li>
            <li class="list-group-item">
                {{$organization->about_ar}}
            </li>
            <li class="list-group-item">
            <img src="{{asset('storage/'.$organization->picture_org)}}" alt="image organization" style="width:100px;height:100px">
            </li>
            <li class="list-group-item">
            <img src="{{asset('storage/'.$organization->picture_cover)}}" alt="image organization" style="width:100px;height:100px">
            </li>



        </ul>
        <a href="{{route('admin.organizations.index')}}" class="form-control btn btn-primary">Back</a>
    </div>
</div>


@endsection

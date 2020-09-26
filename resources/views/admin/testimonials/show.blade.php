@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{__('testimonials')}}</h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                {{__('messages.name_testimonial')}}
            </li>
            <li class="list-group-item">
                {{$testimonial->name}}
            </li>

            <li class="list-group-item">
                {{__('messages.picture_testimonial')}}
            </li>
            <li class="list-group-item">
            <img src="{{asset('storage/'.$testimonial->picture)}}" alt="image testimonial" style="width:100px;height:100px">
            </li>

            <li class="list-group-item">
                {{__('messages.description_testimonial')}}
            </li>
            <li class="list-group-item">
                {{$testimonial->description}}
            </li>

            <li class="list-group-item">
                {{__('messages.rate_testimonial')}}
            </li>
            <li class="list-group-item">
                {{$testimonial->rate}}
            </li>

        </ul>
        <a href="{{route('admin.testimonials.index')}}" class="form-control btn btn-primary">
            {{__('messages.back')}}
        </a>
    </div>
</div>


@endsection

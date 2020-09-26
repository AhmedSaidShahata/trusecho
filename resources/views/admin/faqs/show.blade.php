@extends('home')

@section('content')


<div class="card show">

    <div class="card-header">
        <h2>{{__('messages.faqs')}}</h2>
    </div>
    <div class="card-body">
    <ul class="list-group">
        <li class="list-group-item">
            {{__('messages.question')}}
        </li>
        <li class="list-group-item">
            {{$faq->question}}
        </li>

        <li class="list-group-item">
        {{__('messages.answer')}}
        </li>
        <li class="list-group-item">
            {{$faq->answer}}
        </li>
    </ul>
        <a href="{{route('admin.faqs.index')}}" class="form-control btn btn-primary">
        {{__('messages.back')}}
        </a>
    </div>
</div>


@endsection

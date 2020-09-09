@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>Organization {{$organization->name}} </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                {{__('messages.email')}}
            </li>
            <li class="list-group-item">
                {{$organization->email}}
            </li>

            <li class="list-group-item">
                {{__('messages.whatsapp_num')}}
            </li>
            <li class="list-group-item">
                {{$organization->whatsapp}}

            </li>


            <li class="list-group-item">
                {{__('messages.description')}}
            </li>
            <li class="list-group-item">
                {{$organization->description}}
            </li>


            <li class="list-group-item">
                {{__('messages.about')}}
            </li>
            <li class="list-group-item">
                {{$organization->about}}
            </li>
            <li class="list-group-item">
                {{__('messages.pic_org')}}
            </li>
            <li class="list-group-item">
                <img src="{{asset('storage/'.$organization->picture_org)}}" alt="image organization" style="width:100px;height:100px">
            </li>
            <li class="list-group-item">
                {{__('messages.pic_cover')}}
            </li>
            <li class="list-group-item">
                <img src="{{asset('storage/'.$organization->picture_cover)}}" alt="image organization" style="width:100px;height:100px">
            </li>



        </ul>
        <a href="{{route('admin.organizations.index')}}" class="form-control btn btn-primary">{{__('messages.back')}}</a>
    </div>
</div>


@endsection

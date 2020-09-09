@extends('home')
@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">

    <div class="card-header">
        <h2>{{isset($organization)? __('messages.edit_org') : __('messages.add_org') }}</h2>
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

        <form action="{{isset($organization) ? route('admin.organizations.update',$organization->id) : route('admin.organizations.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($organization))
            @method('PUT')

            @endif


            <input type="hidden" value="{{Auth::user()->id}}" name="user_id" />

            <input type="hidden" name="lang" value="{{$lang}}">

            <div class="form-group">
                <label>{{__('messages.name')}}</label>
                <input type="text" name="name" class="form-control" value="{{isset($organization)?$organization->name:''}}">
            </div>
            <div class="form-group">
                <label>{{__('messages.country')}}</label>
                <input type="text" name="country" class="form-control" value="{{isset($organization)?$organization->country:''}}">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{__('messages.description')}}</label>
                <textarea class="form-control" name="description" id="" cols="50" rows="10">{{isset($organization) ? $organization->description : ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{__('messages.about')}}</label>
                <textarea class="form-control" name="about" id="" cols="50" rows="10">{{isset($organization) ? $organization->about : ''}}</textarea>
            </div>



            <div class="form-group">
                @if(isset($organization))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$organization->picture_org}}" alt="{{$organization->name}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <label> {{__('messages.pic_org')}} </label>
                    <div class="custom-file">
                        <input type="file" name="picture_org">
                    </div>
                </div>
            </div>


            <div class="form-group">
                @if(isset($organization))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$organization->picture_cover}}" alt="{{$organization->name}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <label> {{__('messages.pic_cover')}}</label>
                    <div class="custom-file">
                        <input type="file" name="picture_cover">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>{{__('messages.email')}}</label>
                <input type="text" name="email" class="form-control" value="{{isset($organization)?$organization->email:''}}">
            </div>

            <div class="form-group">
                <label>{{__('messages.website')}}</label>
                <input type="text" name="website" class="form-control" value="{{isset($organization)?$organization->website:''}}">
            </div>

            <div class="form-group">
                <label>{{__('messages.whatsapp_num')}}</label>
                <input type="text" name="whatsapp" class="form-control" value="{{isset($organization)?$organization->whatsapp:''}}">
            </div>


            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($organization)? __('messages.update') : __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

@extends('home')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}


<div class="card">

    <div class="card-header">
        <h2>{{isset($service)? __('messages.edit_service'):__('messages.add_service')}}</h2>
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

        <form action="{{isset($service) ? route('admin.services.update',$service->id) : route('admin.services.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($service))
            @method('PUT')
            @endif

            <input type="hidden" value="{{Auth::user()->id}}" name="user_id" />

            <input type="hidden" name="lang" value="{{$lang}}">

            <div class="input-group my-2">
                <label>{{__('messages.specializations')}}</label>
                <select class="form-control" name="specialization_id">
                    @forelse($specializations as $specialization)

                    <option <?php if (isset($job) and $specialization->id == $job->specialization_id) echo 'selected' ?> value="{{$specialization->id}}">
                        {{$specialization->name }}
                    </option>
                    @empty
                    <option disabled selected>
                        {{__('messages.choose_specs')}}
                    </option>
                    @endforelse
                </select>
            </div>

            <div class="form-group">
                <label>{{__('messages.title')}}</label>
                <input type="text" name="title" class="form-control" value="{{isset($service)?$service->title:''}}">
            </div>
            <div class="form-group">
                <label>{{__('messages.description')}}</label>
                <input type="text" name="description" class="form-control" value="{{isset($service)?$service->description:''}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{__('messages.content')}}</label>
                <textarea class="form-control" name="content" id="" cols="50" rows="10">{{isset($service) ? $service->content : ''}}</textarea>
            </div>

            <div class="form-group">
                @if(isset($service))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$service->picture}}" alt="{{$service->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>{{__('messages.price')}}</label>
                <input min="1" type="number" class="form-control" name="price" value="{{isset($service) ? $service->price : ''}}">
            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($service) ? __('messages.update') :  __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

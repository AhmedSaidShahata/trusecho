@extends('home')
@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}
<div class="card">

    <div class="card-header">
        <h2>{{isset($job)? __('messages.edit_job')  :  __('messages.add_job') }}</h2>
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

            <input type="hidden" name="lang" value="{{$lang}}">

            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


            <div class="form-group">
                <label >{{ __('messages.title')}}</label>
                <input required type="text" name="title" class="form-control" value="{{isset($job)?$job->title:''}}">
            </div>
            <div class="form-group">
                <label >{{__('messages.description')}}</label>
                <input required type="text" name="description" class="form-control" value="{{isset($job)?$job->description:''}}">
            </div>

            <div class="form-group">
                <label >{{__('messages.location')}}</label>
                <input required type="text" name="location" class="form-control" value="{{isset($job)?$job->location:''}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{__('messages.requirments')}}</label>
                <textarea class="form-control" name="requirments" id="" cols="50" rows="10">{{isset($job) ? $job->requirments : ''}}</textarea>
            </div>

            <div class="form-group">
                <label >{{ __('messages.salary')}}</label>
                <input required type="number" name="salary" class="form-control" value="{{isset($job)?$job->salary:''}}">
            </div>

            <div class="form-group">
                <label >{{ __('messages.company')}}</label>
                <input required type="text" name="company" class="form-control" value="{{isset($job)?$job->company:''}}">
            </div>

            <div class="form-group">
                @if(isset($job))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$job->picture}}" alt="{{$job->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <label>{{__('messages.picture_company')}}</label>
                    <div class="custom-file">
                        <input type="file" name="picture_company">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label >{{__('messages.deadline')}}</label>
                <input required type="date" name="deadline" class="form-control" value="{{isset($job)?$job->deadline:''}}">
            </div>

            <div class="form-group">
                <label >{{__('messages.email')}} </label>
                <input required type="text" name="email" class="form-control" value="{{isset($job)?$job->email:''}}">
            </div>

            <div class="form-group">
                <label >{{__('messages.contact')}} </label>
                <input required type="text" name="contact" class="form-control" value="{{isset($job)?$job->contact:''}}">
            </div>

            <div class="form-group">
                @if(isset($job))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$job->picture}}" alt="{{$job->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <label>{{__('messages.picture')}}</label>
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>

            <div class="input-group mt-4">
                <label>{{__('messages.types')}}</label>
                <select class="form-control" name="type_id">
                    @foreach($types as $type)

                    <option <?php if (isset($job) and $type->id == $job->type_id) echo 'selected' ?> value="{{$type->id}}">{{$type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group my-4">
                <label>{{__('messages.specializations')}}</label>
                <select class="form-control" name="specialization_id">
                    @foreach($specializations as $specialization)

                    <option <?php if (isset($job) and $specialization->id == $job->specialization_id) echo 'selected' ?> value="{{$specialization->id}}">{{$specialization->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input required class="btn btn-success form-control" type="submit" value="{{isset($job)? __('messages.update') : __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

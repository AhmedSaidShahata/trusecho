@extends('home')
@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}
<div class="card">

    <div class="card-header">
        <h2>{{isset($opportunity)? __('messages.edit_opp') : __('messages.add_opp') }}</h2>
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
        <form action="{{isset($opportunity) ? route('admin.opportunitys.update',$opportunity->id) : route('admin.opportunitys.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($opportunity))
            @method('PUT')

            @endif
            <div class="input-group my-4">
                <label>{{__('messages.specializations')}}</label>
                <select class="form-control" name="specialization_id">
                    @foreach($specializations as $specialization)

                    <option <?php if (isset($job) and $specialization->id == $job->specialization_id) echo 'selected' ?> value="{{$specialization->id}}">
                        {{$specialization->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="lang" value="{{$lang}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">



            <div class="form-group">
                <label for="category"> {{__('messages.title')}}</label>
                <input type="text" name="title" class="form-control" value="{{isset($opportunity)?$opportunity->title:''}}">
            </div>
            <div class="form-group">
                <label for="category">{{__('messages.description')}}</label>
                <input type="text" name="description" class="form-control" value="{{isset($opportunity)?$opportunity->description:''}}">
            </div>
            <div class="form-group">
                <label for="category">{{__('messages.company')}}</label>
                <input type="text" name="company" class="form-control" value="{{isset($opportunity)?$opportunity->company:''}}">
            </div>

            <div class="form-group">
                <label for="category">{{__('messages.location')}}</label>
                <input type="text" name="location" class="form-control" value="{{isset($opportunity)?$opportunity->location:''}}">
            </div>

            <div class="form-group">
                <label>{{__('messages.requirments')}} </label>
                <textarea class="form-control" name="requirments" id="" cols="50" rows="10">{{isset($opportunity) ? $opportunity->requirments : ''}}</textarea>
            </div>

            <div class="form-group">
                <label>{{__('messages.content')}}</label>
                <textarea class="form-control" name="content" id="" cols="50" rows="10">{{isset($opportunity) ? $opportunity->content : ''}}</textarea>
            </div>


            <div class="form-group">
                <label for="category">{{__('messages.deadline')}}</label>
                <input type="date" name="deadline" class="form-control" value="{{isset($opportunity)?$opportunity->deadline:''}}" placeholder="Add a description">
            </div>

            <div class="form-group">
                <label for="category">{{__('messages.email')}}</label>
                <input type="text" name="email" class="form-control" value="{{isset($opportunity)?$opportunity->email:''}}" placeholder="Add Email">
            </div>
            <div class="form-group">
                @if(isset($opportunity))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$opportunity->picture}}" alt="{{$opportunity->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <label for="">{{__('messages.picture')}}</label>
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($opportunity)? __('messages.update') : __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

@extends('home')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">
    <div class="card-header">
        <h2>{{isset($scholarship) ? __('messages.edit_scholar') : __('messages.add_scholar')  }}</h2>
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
        <form action="{{isset($scholarship) ? route('admin.scholarships.update',$scholarship->id) : route('admin.scholarships.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($scholarship))
            @method('PUT')

            @endif



            <input type="hidden" value="{{Auth::user()->id}}" name="user_id" />

            <input type="hidden" name="lang" value="{{$lang}}">


            <div class="input-group">
                <label>{{__('messages.costs')}}</label>

                <select class="form-control" name="cost_id">
                    @forelse($costs as $cost)

                    <option <?php if (isset($scholarship) and $cost->id == $scholarship->cost_id) echo 'selected' ?> value="{{$cost->id}}">
                        {{$cost->name}}
                    </option>
                    @empty
                    <option value="">
                        {{__('messages.choose_costs')}}
                    </option>
                    @endforelse
                </select>
            </div>
            <div class="input-group mt-2">
                <label>{{__('messages.types')}}</label>
                <select class="form-control" name="type_id">
                    @forelse($types as $type)

                    <option <?php if (isset($scholarship) and $type->id == $scholarship->type_id) echo 'selected' ?> value="{{$type->id}}">
                        {{$type->name }}
                    </option>
                    @empty
                    <option value="">
                        {{__('messages.choose_types')}}
                    </option>
                    @endforelse
                </select>
            </div>

            <div class="input-group mt-2">
                <label>{{__('messages.specializations')}}</label>
                <select class="form-control" name="specialization_id">
                    @forelse($specializations as $specialization)

                    <option <?php if (isset($scholarship) and $specialization->id == $scholarship->specialization_id) echo 'selected' ?> value="{{$specialization->id}}">
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
                <label > {{__('messages.title')}}</label>
                <input type="text" name="title" class="form-control" value="{{isset($scholarship)?$scholarship->title:''}}">
            </div>
            <div class="form-group">
                <label >{{__('messages.description')}} </label>
                <input type="text" name="description" class="form-control" value="{{isset($scholarship)?$scholarship->description:''}}">
            </div>

            <div class="form-group">
                <label >{{__('messages.location')}}</label>
                <input type="text" name="location" class="form-control" value="{{isset($scholarship)?$scholarship->location:''}}">
            </div>
            <div class="form-group">
                <label >{{__('messages.company')}}</label>
                <input type="text" name="company" class="form-control" value="{{isset($scholarship)?$scholarship->location:''}}">
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{__('messages.content')}}</label>
                <textarea class="form-control" name="content" id="" cols="50" rows="10">{{isset($scholarship) ? $scholarship->content : ''}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{__('messages.requirments')}}</label>
                <textarea class="form-control" name="requirments" id="" cols="50" rows="10">{{isset($scholarship) ? $scholarship->requirments : ''}}</textarea>
            </div>


            <div class="form-group">
                <label >{{__('messages.deadline')}}</label>
                <input type="date" name="deadline" class="form-control" value="{{isset($scholarship)?$scholarship->deadline:''}}">
            </div>

            <div class="form-group">
                <label >{{__('messages.email')}}</label>
                <input type="text" name="email" class="form-control" value="{{isset($scholarship)?$scholarship->email:''}}">
            </div>
            <div class="form-group">
                @if(isset($scholarship))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$scholarship->picture}}" alt="{{$scholarship->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        {{__('messages.picture')}}
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($scholarship)? __('messages.update') : __('messages.publish')  }}" />
            </div>
        </form>
    </div>
</div>


@endsection

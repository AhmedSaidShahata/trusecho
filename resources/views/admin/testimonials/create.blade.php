@extends('home')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">

    <div class="card-header">
        <h2>{{isset($testimonial)? __('messages.edit_testimonial') :  __('messages.add_testimonial') }}</h2>
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

        <form action="{{isset($testimonial) ? route('admin.testimonials.update',$testimonial->id) : route('admin.testimonials.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($testimonial))
            @method('PUT')

            @endif

            <input required type="hidden" name="lang" value="{{$lang}}">


            <input required type="hidden" name="user_id" value="{{Auth::user()->id}}">

            <div class="form-group">
                <label>{{__('messages.name_testimonial')}}</label>
                <input required type="text" name="name" class="form-control" value="{{isset($testimonial)?$testimonial->name:''}}">
            </div>
            <div class="form-group">
                <label>{{__('messages.description_testimonial')}}</label>
                <textarea class="form-control" name="description" id="" cols="50" rows="10">{{isset($testimonial) ? $testimonial->description : ''}}</textarea>
            </div>

            <div class="form-group">
                <label>
                    {{__('messages.rate_testimonial')}}
                    <span style="color: gray; font-size:14px">
                        {{__('messages.from_1_to_5')}}
                    </span>

                </label>
                <input required type="text" name="rate" class="form-control" value="{{isset($testimonial)?$testimonial->rate:''}}">
            </div>

            <div class="form-group">
                @if(isset($testimonial))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$testimonial->picture}}" alt="{{$testimonial->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <label>
                            {{__('messages.picture')}}
                        </label>
                        <input  type="file" name="picture">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <input required class="btn btn-success form-control" type="submit" value="{{isset($testimonial)? __('messages.update') : __('messages.publish')  }}" />
            </div>
        </form>
    </div>
</div>


@endsection


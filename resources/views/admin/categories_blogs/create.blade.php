@extends('home')

@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">

    <div class="card-header">
        <h2>{{isset($categoryBlog) ? __('messages.edit_cat') :  __('messages.add_cat') }}</h2>
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
        <form action="{{isset($categoryBlog) ? route('admin.categories.update', $categoryBlog->id ): route('admin.categories.store')}} " method="POST" enctype="multipart/form-data">
            @if(isset($categoryBlog))
            @method('PUT')
            @endif
            @csrf

            <input type="hidden" value="{{$lang}}" name="lang">

            <div class="form-group">
                <label for="category">{{__('messages.name')}}</label>
                <input type="text" name="name" class="form-control" value="{{isset($categoryBlog) ? $categoryBlog->name : ''}}" >

            </div>

            <div class="form-group">
                @if(isset($categoryBlog))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$categoryBlog->picture}}" alt="{{$categoryBlog->name}}">
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
                <input class="btn btn-success form-control" type="submit" value="{{isset($categoryBlog) ?  __('messages.update')  :  __('messages.publish') }}" />
            </div>
        </form>
    </div>
</div>


@endsection

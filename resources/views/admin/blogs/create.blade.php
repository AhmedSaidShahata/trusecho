@extends('home')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">

    <div class="card-header">
        <h2>{{isset($blog)? __('messages.edit_blog') :  __('messages.add_blog') }}</h2>
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

        <form action="{{isset($blog) ? route('admin.blogs.update',$blog->id) : route('admin.blogs.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
            @if(isset($blog))
            @method('PUT')

            @endif

            <input type="hidden" name="lang" value="{{$lang}}">

            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

            <div class="form-group">
                <label >{{__('messages.title')}}</label>
                <input type="text" name="title" class="form-control" value="{{isset($blog)?$blog->title:''}}">
            </div>
            <div class="form-group">
                <label >{{__('messages.description')}}</label>
                <input type="text" name="description" class="form-control" value="{{isset($blog)?$blog->description:''}}">
            </div>



            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{__('messages.content')}}</label>

                <textarea class="form-control" name="content" id="" cols="50" rows="10">{{isset($blog) ? $blog->content : ''}}</textarea>

                <div class="input-group mt-5 ">
                    <label>{{__('messages.cat')}}</label>

                    <select class="form-control" name="category_blog_id">
                        @foreach($categories as $category)

                        <option <?php if (isset($blog) and $category->id == $blog->cat_id) echo 'selected' ?> value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>


            <div class="form-group">
                @if(isset($blog))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$blog->picture}}" alt="{{$blog->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <label>
                            {{__('messages.picture')}}
                        </label>
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($blog)? __('messages.update') : __('messages.publish')  }}" />
            </div>
        </form>
    </div>
</div>


@endsection

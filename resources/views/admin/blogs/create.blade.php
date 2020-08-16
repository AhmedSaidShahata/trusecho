@extends('home')
@section('content')



<div class="card">

    <div class="card-header">
        <h2>{{isset($blog)?'Edit blog':'Add blog'}}</h2>
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

            <div class="form-group">
                <label for="category">blog title:</label>
                <input type="text" name="title" class="form-control" value="{{isset($blog)?$blog->title:''}}" placeholder="Add a new blog">
            </div>
            <div class="form-group">
                <label for="category">blog description</label>
                <input type="text" name="description" class="form-control" value="{{isset($blog)?$blog->description:''}}" placeholder="Add a description">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">content</label>
                <!-- <textarea class="form-control" name="content" rows="3"></textarea> -->

                <textarea class="form-control" name="content" id="" cols="50" rows="10">
                {{isset($blog) ? $blog->content : ''}}
                </textarea>

                @if(isset($blog))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$blog->picture}}" alt="{{$blog->title}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>

                <div class="input-group ">

                    <label>Category</label>

                    <select class="form-control" name="cat_id">
                        @foreach($categories as $category)

                        <option <?php if (isset($blog) and $category->id == $blog->cat_id) echo 'selected' ?> value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>


            <!-- <div class="input-group ">

                <label>Category</label>
                <select name="category_id">

                </select>
            </div> -->

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($blog)?'Update':'Puplish'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

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

            <!-------------------------------------------------------- English ------------------------------------>
            <p class="text-center p-2" style="background:burlywood">Blog Engish </p>
            <div class="form-group">
                <label for="category">blog title:</label>
                <input type="text" name="title_en" class="form-control" value="{{isset($blog)?$blog->title_en:''}}" placeholder="Add a new blog">
            </div>
            <div class="form-group">
                <label for="category">blog description</label>
                <input type="text" name="description_en" class="form-control" value="{{isset($blog)?$blog->description_en:''}}" placeholder="Add a description">
            </div>



            <div class="form-group">
                <label for="exampleFormControlTextarea1">content</label>
                <!-- <textarea class="form-control" name="content" rows="3"></textarea> -->

                <textarea class="form-control" name="content_en" id="" cols="50" rows="10">{{isset($blog) ? $blog->content_en : ''}}</textarea>

                <div class="input-group mt-5 ">
                    <label>Category English</label>

                    <select class="form-control" name="cat_id">
                        @foreach($categories as $category)

                        <option <?php if (isset($blog) and $category->id == $blog->cat_id) echo 'selected' ?> value="{{$category->id}}">{{$category->name_en}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <!-------------------------------------------------------- Arabic ------------------------------------>
            <p class="text-center p-2" style="background:burlywood">Blog Arabic </p>
            <div class="form-group">
                <label for="category">blog title Arabic</label>
                <input type="text" name="title_ar" class="form-control" value="{{isset($blog)?$blog->title_ar:''}}" placeholder="Add a new blog">
            </div>

            <div class="form-group">
                <label for="category">blog description Arabic</label>
                <input type="text" name="description_ar" class="form-control" value="{{isset($blog)?$blog->description_ar:''}}" placeholder="Add a description">
            </div>

            <label for="exampleFormControlTextarea1">content Arabic</label>
            <textarea class="form-control" name="content_ar" id="" cols="50" rows="10">{{isset($blog) ? $blog->content_ar : ''}}</textarea>


            <div class="input-group mt-5 ">
                    <label>Category English</label>

                    <select class="form-control" name="cat_id">
                        @foreach($categories as $category)

                        <option <?php if (isset($blog) and $category->id == $blog->cat_id) echo 'selected' ?> value="{{$category->id}}">{{$category->name_ar}}</option>
                        @endforeach
                    </select>
                </div>

            <div class="form-group">
                @if(isset($blog))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$blog->picture}}" alt="{{$blog->title_en}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($blog)?'Update':'Puplish'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

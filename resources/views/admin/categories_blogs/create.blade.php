@extends('home')

@section('content')


<div class="card">

    <div class="card-header">
        <h2>{{isset($categoryBlog) ?'update your category'.$categoryBlog->name : 'Add a new Category'}}</h2>
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
            <div class="form-group">
                <label for="category">Category Name English</label>
                <input type="text" name="name_en" class="form-control" value="{{isset($categoryBlog) ? $categoryBlog->name_en : ''}}"  placeholder="Add a new category">

            </div>

            <div class="form-group">
                <label for="category">Category Name Arabic</label>
                <input type="text" name="name_ar" class="form-control" value="{{isset($categoryBlog) ? $categoryBlog->name_ar : ''}}"  placeholder="Add a new category">
            </div>

            <div class="form-group">
                @if(isset($categoryBlog))
                <div>
                    <img style="height:200px; width:400px" src="/storage/{{$categoryBlog->picture}}" alt="{{$categoryBlog->title_en}}">
                </div>
                @endif
                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" name="picture">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($categoryBlog) ?'update': 'Add'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

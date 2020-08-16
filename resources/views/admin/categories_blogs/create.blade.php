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
        <form action="{{isset($categoryBlog) ? route('admin.categories.update', $categoryBlog->id ): route('admin.categories.store')}} " method="POST">
            @if(isset($categoryBlog))
            @method('PUT')
            @endif
            @csrf
            <div class="form-group">
                <label for="category">Category Name:</label>
                <input type="text" name="name" class="form-control" value="{{isset($categoryBlog) ? $categoryBlog->name : ''}}" class="@error('name') is-invalid @enderror" placeholder="Add a new category">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="{{isset($categoryBlog) ?'update': 'Add'}}" />
            </div>
        </form>
    </div>
</div>


@endsection

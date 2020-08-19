@extends('home')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<table class="table table-dark">
    <a href="{{route('admin.blogs.create')}}" class="mt-2 btn btn-primary form-control">Add Blog</a>
    <thead>


        <tr>
            <th scope="col">id</th>
            <th scope="cpl">image</th>
            <th scope="col">Author</th>
            <th scope="col">Title English</th>
            <th scope="col">Description English</th>
            <th scope="col">Content English</th>
            <th scope="col">Category English</th>
            <th scope="col">Title Arabic</th>
            <th scope="col">Description Arabic</th>
            <th scope="col">Content Arabic</th>
            <th scope="col">Category Arabic</th>
            <th>Controls</th>
        </tr>
    </thead>
    <tbody>
        @forelse($blogs as $blog )
        <tr>
            <th scope="row">{{$blog->id}}</th>
            <td><img src="{{asset('storage/'.$blog->picture)}}" alt="image blog" style="width:100px;height:100px"></td>
            <td>{{$blog->user->name}}</td>
            <td>{{$blog->title_en}}</td>
            <td>{{$blog->description_en}}</td>
            <td>{{$blog->content_en}}</td>
            <td>
                {{!$category=App\CategoryBlog::find($blog->cat_id) }}
                {{$category->name_en}}
            </td>
            <td>{{$blog->title_ar}}</td>
            <td>{{$blog->description_ar}}</td>
            <td>{{$blog->content_ar}}</td>
            <td>{{$category->name_ar}}</td>
            <td class="d-flex">

                <a href="{{route('admin.blogs.edit',$blog->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                <form method="POST" class="form-inline" action="{{route('admin.blogs.destroy',$blog->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn "><i class="far fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
        @empty
        <div class="alert alert-primary" role="alert">
            No Blogs Yet
        </div>
        @endforelse
    </tbody>
</table>
@endsection

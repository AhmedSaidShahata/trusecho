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
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Content</th>
            <th>Controls</th>
        </tr>
    </thead>
    <tbody>
        @forelse($blogs as $blog )
        <tr>
            <th scope="row">{{$blog->id}}</th>
            <td><img src="{{asset('storage/'.$blog->picture)}}" alt="image blog" style="width:100px;height:100px"></td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->description}}</td>
            <td>{{$blog->content}}</td>

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

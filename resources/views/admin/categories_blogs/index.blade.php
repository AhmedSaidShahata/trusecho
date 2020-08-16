@extends('home')

@section('content')


<a href="{{route('admin.categories.create')}}" class="mt-2 btn btn-primary form-control">Add Category</a>

@if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
@endif




<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">Add Date</th>
            <th scope="col">Update Date</th>
            <th scope="col">controls</th>

        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
            <td class="d-flex">

                <a href="{{route('admin.categories.edit',$category->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.categories.destroy',$category->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
            No Categories Yet
        </div>

        @endforelse

    </tbody>
</table>




@endsection

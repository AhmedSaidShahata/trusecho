@extends('home')
@section('content')

<table class="table table-dark">
    <a href="{{route('admin.scholarships.create')}}" class="mt-2 btn btn-primary form-control">Add ScholarShip</a>
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
        @forelse($scholarships as $scholarship )
        <tr>
            <th scope="row">{{$scholarship->id}}</th>
            <td><img src="{{asset('storage/'.$scholarship->picture)}}" alt="image scholarship" style="width:100px;height:100px"></td>
            <td>{{$scholarship->title}}</td>
            <td>{{$scholarship->description}}</td>
            <td>{{$scholarship->content}}</td>

            <td class="d-flex">

                <a href="{{route('admin.scholarships.edit',$scholarship->id)}}" class="btn"><i class="far fa-edit"></i> </a>
                <form method="POST" class="form-inline" action="{{route('admin.scholarships.destroy',$scholarship->id)}}">
                       @csrf
                       @method('DELETE')
                       <button type="submit" class="btn "><i class="far fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
        @empty
        <div class="alert alert-primary" role="alert">
            No scholarships Yet
        </div>
        @endforelse
    </tbody>
</table>
@endsection

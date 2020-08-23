@extends('home')

@section('content')


<a href="{{route('admin.types.create')}}" class="mt-2 btn btn-primary form-control">Add type</a>

@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif




<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name English</th>
            <th scope="col">Name Arabic</th>
            <th scope="col">Add Date</th>
            <th scope="col">Update Date</th>
            <th scope="col">controls</th>

        </tr>
    </thead>
    <tbody>
        @forelse($types as $type)
        <tr>
            <th scope="row">{{$type->id}}</th>
            <td>{{$type->name_en}}</td>
            <td>{{$type->name_ar}}</td>
            <td>{{$type->created_at}}</td>
            <td>{{$type->updated_at}}</td>
            <td class="d-flex">

                <a href="{{route('admin.types.edit',$type->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.types.destroy',$type->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
            No types Yet
        </div>

        @endforelse

    </tbody>
</table>




@endsection

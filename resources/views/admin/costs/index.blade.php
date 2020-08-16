@extends('home')

@section('content')


<a href="{{route('admin.costs.create')}}" class="mt-2 btn btn-primary form-control">Add cost</a>

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
        @forelse($costs as $cost)
        <tr>
            <th scope="row">{{$cost->id}}</th>
            <td>{{$cost->name}}</td>
            <td>{{$cost->created_at}}</td>
            <td>{{$cost->updated_at}}</td>
            <td class="d-flex">

                <a href="{{route('admin.costs.edit',$cost->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.costs.destroy',$cost->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
            No costs Yet
        </div>

        @endforelse

    </tbody>
</table>




@endsection

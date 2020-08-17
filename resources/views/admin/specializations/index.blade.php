@extends('home')

@section('content')


<a href="{{route('admin.specializations.create')}}" class="mt-2 btn btn-primary form-control">Add specialization</a>

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
        @forelse($specializations as $specialization)
        <tr>
            <th scope="row">{{$specialization->id}}</th>
            <td>{{$specialization->name}}</td>
            <td>{{$specialization->created_at}}</td>
            <td>{{$specialization->updated_at}}</td>
            <td class="d-flex">

                <a href="{{route('admin.specializations.edit',$specialization->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.specializations.destroy',$specialization->id)}}">
                    @csrf
                    @method('DELETE')
                    <button specialization="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
            No specializations Yet
        </div>

        @endforelse

    </tbody>
</table>




@endsection

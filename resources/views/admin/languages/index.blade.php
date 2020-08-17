@extends('home')

@section('content')


<a href="{{route('admin.languages.create')}}" class="mt-2 btn btn-primary form-control">Add language</a>

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
        @forelse($languages as $language)
        <tr>
            <th scope="row">{{$language->id}}</th>
            <td>{{$language->name}}</td>
            <td>{{$language->created_at}}</td>
            <td>{{$language->updated_at}}</td>
            <td class="d-flex">

                <a href="{{route('admin.languages.edit',$language->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.languages.destroy',$language->id)}}">
                    @csrf
                    @method('DELETE')
                    <button language="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
            No languages Yet
        </div>

        @endforelse

    </tbody>
</table>




@endsection

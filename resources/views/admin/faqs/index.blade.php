@extends('home')

@section('content')


<a href="{{route('admin.faqs.create')}}" class="mt-2 btn btn-primary form-control">Add faq</a>

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
        @forelse($faqs as $faq)
        <tr>
            <th scope="row">{{$faq->id}}</th>
            <td>{{$faq->question}}</td>
            <td>{{$faq->answer}}</td>
            <td>{{$faq->created_at}}</td>
            <td>{{$faq->updated_at}}</td>
            <td class="d-flex">

                <a href="{{route('admin.faqs.edit',$faq->id)}}" class="btn"> <i class="far fa-edit"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.faqs.destroy',$faq->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
            No faqs Yet
        </div>

        @endforelse

    </tbody>
</table>




@endsection

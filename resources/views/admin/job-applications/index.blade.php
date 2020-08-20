@extends('home')

@section('content')




@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif




<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">fullname</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">message</th>
            <th scope="col">cv</th>
            <th scope="col">Apply Date</th>
            <th scope="col">controls</th>

        </tr>
    </thead>
    <tbody>
        @forelse($jobapps as $jobapp)
        <tr>
            <th scope="row">{{$jobapp->id}}</th>
            <td>{{$jobapp->fullname}}</td>
            <td>{{$jobapp->email}}</td>
            <td>{{$jobapp->phone}}</td>
            <td>{{$jobapp->message}}</td>
            <td>
                <a href="{{asset('files/'.$jobapp->cv)}}" download="">{{$jobapp->fullname}} cv</a>
            </td>
            <td>{{$jobapp->created_at}}</td>

            <td class="d-flex">


                <form method="POST" class="form-inline" action="{{route('admin.jobapps.destroy',$jobapp->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
            No jobapps Yet
        </div>

        @endforelse

    </tbody>
</table>




@endsection

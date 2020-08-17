@extends('home')

@section('content')


<a href="{{route('admin.contacts.create')}}" class="mt-2 btn btn-primary form-control">Add contact</a>

@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif




<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Watch</th>
            <th scope="col">Recieved Date</th>
            <th scope="col">controls</th>

        </tr>
    </thead>
    <tbody>
        @forelse($contacts as $contact)
        <tr class="{{$contact->watch=='Not Seen' ? 'bg-red':''}}">
            <th scope="row">{{$contact->id}}</th>
            <td>{{$contact->fullname}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->message}}</td>
            <td>{{$contact->watch}}</td>
            <td>{{$contact->created_at}}</td>

            <td class="d-flex">

                <a href="{{route('admin.contacts.show',$contact->id)}}" class="btn"> <i class="far fa-eye"></i></a>
                <form method="POST" class="form-inline" action="{{route('admin.contacts.destroy',$contact->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
            No contacts Yet
        </div>

        @endforelse

    </tbody>
</table>




@endsection

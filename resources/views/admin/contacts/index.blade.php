@extends('home')

@section('content')




@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif



<div style="overflow-x: auto;">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.full_name')}}</th>
                <th scope="col">{{__('messages.email')}}</th>
                <th scope="col">{{__('messages.message')}}</th>
                <th scope="col">{{__('messages.watch')}}</th>
                <th scope="col">{{__('messages.rec_date')}}</th>
                <th scope="col">{{__('messages.controls')}}</th>

            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr class="{{$contact->seen=='No' ? 'bg-red':''}}">
                <th scope="row">{{$contact->id}}</th>
                <td>{{$contact->fullname}}</td>
                <td>{{$contact->email}}</td>
                <td>


                    {{ substr($contact->message,0,20) }}

                </td>
                <td>{{$contact->seen=='Yes' ? __('messages.watched') : __('messages.not_watched') }}</td>
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
            <div class="alert alert-primary">
                {{__('messages.no_messages')}}
            </div>
            @endforelse
        </tbody>
    </table>
    {{$contacts->links()}}
</div>



@endsection

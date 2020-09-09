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
                <th scope="col">{{__('messages.phone_number')}}</th>
                <th scope="col">{{__('messages.message')}}</th>
                <th scope="col">{{__('messages.cv')}}</th>
                <th scope="col">{{__('messages.apply_date')}}</th>
                <th scope="col">{{__('messages.controls')}}</th>

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
                {{__('messages.no_job_app')}}
            </div>

            @endforelse

        </tbody>
    </table>
</div>




@endsection

@extends('home')

@section('content')




@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<div style="overflow-x:auto ;">


    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">{{__('messages.serial')}}</th>
                <th scope="col">{{__('messages.scholar_name')}}</th>
                <th scope="col">{{__('messages.full_name')}}</th>
                <th scope="col">{{__('messages.email')}}</th>
                <th scope="col">{{__('messages.phone_number')}}</th>
                <th scope="col">{{__('messages.nationality')}}</th>
                <th scope="col">{{__('messages.address')}}</th>
                <th scope="col">{{__('messages.father_status')}}</th>
                <th scope="col">{{__('messages.mother_status')}}</th>
                <th scope="col">{{__('messages.siblings_count')}}</th>
                <th scope="col">{{__('messages.specialization')}}</th>
                <th scope="col">{{__('messages.university')}}</th>
                <th scope="col">{{__('messages.inteview_loc')}}</th>
                <th scope="col">{{__('messages.user_pic')}}</th>
                <th scope="col">{{__('messages.school_pic')}}</th>
                <th scope="col">{{__('messages.unviversity_pic')}}</th>
                <th scope="col">{{__('messages.letter_pic')}}</th>
                <th scope="col">{{__('messages.language_pic')}}</th>
                <th scope="col">{{__('messages.payment_pic')}}</th>
                <th scope="col">{{__('messages.passport_pic')}}</th>
                <th scope="col">{{__('messages.high_school')}}</th>
                <th scope="col">{{__('messages.research')}}</th>
                <th scope="col">{{__('messages.degree')}}</th>
                <th scope="col">{{__('messages.apply_date')}}</th>
                <th scope="col">{{__('messages.controls')}}</th>

            </tr>
        </thead>
        <tbody>
            @forelse($appscholarships as $appscholarship)
            <tr class="{{ $appscholarship->seen == 0 ? 'bg-red': ''}} ">
                <td>
                    {{$appscholarship->id}}
                </td>
                <td>
                    {{App\Scholarship::where(['id'=>$appscholarship->scholar_id])->get()->first()->title}}
                </td>
                <td>{{$appscholarship->fullname}}</td>
                <td>{{$appscholarship->email}}</td>
                <td>{{$appscholarship->phone}}</td>
                <td>{{$appscholarship->nationality}}</td>
                <td>{{$appscholarship->address}}</td>
                <td>{{$appscholarship->father_status}}</td>
                <td>{{$appscholarship->mother_status}}</td>
                <td>{{$appscholarship->siblings}}</td>
                <td>{{$appscholarship->specialization}}</td>
                <td>{{$appscholarship->university}}</td>
                <td>{{$appscholarship->interview_location}}</td>
                <td>
                    <img src="{{asset('storage/'.$appscholarship->user_picture)}}" alt="image organization" style="width:100px;height:100px">
                </td>
                <td>
                    <img src="{{asset('storage/'.$appscholarship->high_school_picture)}}" alt="image organization" style="width:100px;height:100px">
                </td>
                <td>
                    <img src="{{asset('storage/'.$appscholarship->university_picture)}}" alt="image organization" style="width:100px;height:100px">
                </td>
                <td>
                    <img src="{{asset('storage/'.$appscholarship->letter_picture)}}" alt="image organization" style="width:100px;height:100px">
                </td>
                <td>
                    <img src="{{asset('storage/'.$appscholarship->language_picture)}}" alt="image organization" style="width:100px;height:100px">
                </td>
                <td>
                    <img src="{{asset('storage/'.$appscholarship->payment_picture)}}" alt="image organization" style="width:100px;height:100px">
                </td>
                <td>
                    <img src="{{asset('storage/'.$appscholarship->passport_picture)}}" alt="image organization" style="width:100px;height:100px">
                </td>
                <td>
                    <img src="{{asset('storage/'.$appscholarship->high_school_picture)}}" alt="image organization" style="width:100px;height:100px">
                </td>
                <td>
                    {{$appscholarship->research}}
                </td>
                <td>
                    {{$appscholarship->degree}}
                </td>

                <td>{{$appscholarship->created_at}}</td>

                <td class="d-flex">
                <a href="{{route('admin.appscholarships.show',$appscholarship->id)}}" class="btn"> <i class="far fa-eye"></i></a>
                    <form method="POST" class="form-inline" action="{{route('admin.appscholarships.destroy',$appscholarship->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"> <i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                {{__('messages.no_scholar_app')}}
            </div>

            @endforelse

        </tbody>
    </table>

</div>


@endsection

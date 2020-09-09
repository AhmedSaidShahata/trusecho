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
                <th scope="col">{{__('messages.research')}}</th>
                <th scope="col">{{__('messages.degree')}}</th>
                <th scope="col">{{__('messages.apply_date')}}</th>
                <th scope="col">{{__('messages.controls')}}</th>

            </tr>
        </thead>
        <tbody>
            @forelse($appscholarships as $appscholarship)
            <tr>
                <td>
                    {{App\Scholarship::where(['id'=>$appscholarship->scholar_id])->get()->first()->title_en}}
                </td>
                <td>{{$appscholarship->fullname}}</td>
                <td>{{$appscholarship->email}}</td>
                <td>{{$appscholarship->phone}}</td>
                <td>{{$appscholarship->nationality}}</td>
                <td>{{$appscholarship->address}}</td>
                <td>{{$appscholarship->father_status}}</td>
                <td>{{$appscholarship->mother_status}}</td>
                <td>{{$appscholarship->mother_status}}</td>
                <td>{{$appscholarship->specialization}}</td>
                <td>{{$appscholarship->university}}</td>
                <td>{{$appscholarship->interview_location}}</td>
                <td>{{$appscholarship->user_picture}}</td>
                <td>{{$appscholarship->high_school_picture}}</td>
                <td>{{$appscholarship->university_picture}}</td>
                <td>{{$appscholarship->letter_picture}}</td>
                <td>{{$appscholarship->language_picture}}</td>
                <td>{{$appscholarship->payment_picture}}</td>
                <td>{{$appscholarship->passport_picture}}</td>
                <td>{{$appscholarship->research}}</td>
                <td>{{$appscholarship->degree}}</td>
                <td>{{$appscholarship->high_school_picture}}</td>
                <td>{{$appscholarship->created_at}}</td>

                <td class="d-flex">


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

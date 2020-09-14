@extends('home')

@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="card">

    <div class="card-header">

        <h2> {{App\Scholarship::where(['id'=>$appscholar->scholar_id])->get()->first()->title}} </h2>
    </div>
    <div class="card-body">
        <ul class="list-group">



            <li class="list-group-item">
                {{__('messages.full_name')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->fullname}}
            </li>

            <li class="list-group-item">
                {{__('messages.email')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->email}}
            </li>

            <li class="list-group-item">
                {{__('messages.phone')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->phone}}
            </li>

            <li class="list-group-item">
                {{__('messages.nationality')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->nationality}}
            </li>

            <li class="list-group-item">
                {{__('messages.address')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->address}}
            </li>

            <li class="list-group-item">
                {{__('messages.father_status')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->father_status}}
            </li>

            <li class="list-group-item">
                {{__('messages.mother_status')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->mother_status}}
            </li>

            <li class="list-group-item">
                {{__('messages.siblings_count')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->siblings}}
            </li>

            <li class="list-group-item">
                {{__('messages.specialization')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->specialization}}
            </li>


            <li class="list-group-item">
                {{__('messages.university')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->university}}
            </li>

            <li class="list-group-item">
                {{__('messages.interview_location')}}
            </li>
            <li class="list-group-item">
                {{$appscholar->interview_location}}
            </li>

            <li class="list-group-item">
                {{__('messages.research')}}
            </li>

            <li class="list-group-item">
                {{$appscholar->research}}
            </li>


            <li class="list-group-item">
                {{__('messages.degree')}}
            </li>

            <li class="list-group-item">
                {{$appscholar->degree}}
            </li>

            <li class="list-group-item">
                {{__('messages.user_pic')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$appscholar->user_picture)}}" alt="image$appscholar" style="width:100px;height:100px">
            </li>

            <li class="list-group-item">
                {{__('messages.school_pic')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$appscholar->high_school_picture)}}" alt="image$appscholar" style="width:100px;height:100px">
            </li>

            <li class="list-group-item">
                {{__('messages.unviversity_pic')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$appscholar->university_picture)}}" alt="image$appscholar" style="width:100px;height:100px">
            </li>


            <li class="list-group-item">
                {{__('messages.letter_pic')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$appscholar->letter_picture)}}" alt="image$appscholar" style="width:100px;height:100px">
            </li>


            <li class="list-group-item">
                {{__('messages.language_pic')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$appscholar->language_picture)}}" alt="image$appscholar" style="width:100px;height:100px">
            </li>



            <li class="list-group-item">
                {{__('messages.payment_pic')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$appscholar->payment_picture)}}" alt="image$appscholar" style="width:100px;height:100px">
            </li>




            <li class="list-group-item">
                {{__('messages.passport_pic')}}
            </li>

            <li class="list-group-item">
                <img src="{{asset('storage/'.$appscholar->passport_picture)}}" alt="image$appscholar" style="width:100px;height:100px">
            </li>

            <li class="list-group-item">
                {{__('messages.apply_date')}}
            </li>

            <li class="list-group-item">
                {{$appscholar->created_at}}
            </li>





        </ul>
        <a href="{{route('admin.appscholarships.index')}}" class="form-control btn btn-primary">{{__('messages.back')}}</a>
    </div>
</div>


@endsection

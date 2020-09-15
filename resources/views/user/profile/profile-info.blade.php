@extends('user.layouts.fixed_layout')
@section('content')
<div class="profile-container " style="margin-top: 120px;">
    <img src="{{asset('img/profile-info-2.svg')}}" alt="profile" class="profile-illustration" />
    <div class="profile-info">
        <div class="profile-info__left-box left-box-width-fix">
            <div class="profile-info__left-box-profile-pic-box">
                <img src="{{asset('storage/'.$profile->picture)}}" alt="profile-pic" class="profile-info__left-box-profile-pic" style="width:333px;height:333px;" />
                <!-- <img src="img/country.png" alt="country" class="country-picture" /> -->
            </div>

            {{!$friend_is_exist=App\Friend::where(['user_id'=> Auth::user()->id,'friend_id'=>$friend->id])}}
            {{!$friend_request=App\Friend::where(['user_id'=> $friend->id,'friend_id'=>Auth::user()->id])}}

            @if($friend_is_exist->get()->count()==0 && $friend_is_exist->get()->count()!=0 )
            <button data-userid="{{$friend->id}}" class="change-profile-pic-btn add-friend">{{__('messages.add_friend')}}</button>
            @else
            @if(isset($friend_is_exist->get()->first()->accept))
            @if($friend_is_exist->get()->first()->accept==0)
            <button data-userid="{{$friend->id}}" class="change-profile-pic-btn add-friend">{{__('messages.friend_req')}}</button>
            @else
            <button data-userid="{{$friend->id}}" class="change-profile-pic-btn add-friend">{{__('messages.friends')}}</button>
            @endif
            @endif

            @endif




            @if($friend_request->get()->count()==0 && $friend_is_exist->get()->count()==0)
            <button data-userid="{{$friend->id}}" class="change-profile-pic-btn add-friend">{{__('messages.add_friend')}}</button>
            @else
            @if(isset($friend_request->get()->first()->accept))
            @if($friend_request->get()->first()->accept==0)
            <button data-friend="{{$friend->id}}" class="change-profile-pic-btn accept">{{__('messages.accept_req')}}</button>
            @else
            <button data-userid="{{$friend->id}}" class="change-profile-pic-btn add-friend">{{__('messages.friends')}}</button>
            @endif
            @endif

            @endif



            <button class="change-profile-pic-btn btn-grn-color">
            {{__('messages.whatsapp')}}
                <p>
                    {{$friend->whatsapp }}
                </p>
            </button>
            <form action="mailto:{{$friend->email}}">
                <button class="change-profile-pic-btn btn-prp-color">

                {{__('messages.email')}}
                    <p>
                        {{$friend->email }}
                    </p>
                </button>
            </form>
        </div>

        <div class="profile-info__right-box">
            <div class="info-piece">
                <h1 class="profile__header">{{$friend->name}}</h1>
                <div class="hr"></div>
                <h2 class="profile__subtitle">{{$friend->profile->job}}</h2>
            </div>
            <div class="info-piece">
                <h1 class="profile__header">{{__('messages.summary')}}</h1>
                <div class="hr"></div>
                <h2 class="profile__subtitle">{{$friend->profile->personal_desc}}</h2>
            </div>
            <div class="extra-info-container">
                <div class="extra-info-container__left-box">
                    <div class="info-piece">
                        <h1 class="profile__header">{{__('messages.phone_number')}}</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">{{$friend->profile->phone}}</h2>
                    </div>
                    <div class="info-piece">
                        <h1 class="profile__header">{{__('messages.address')}}</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">{{$friend->profile->address}}</h2>
                    </div>
                    <div class="info-piece">
                        <h1 class="profile__header">{{__('messages.gender')}}</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">{{$friend->profile->gender}}</h2>
                    </div>
                </div>
                <div class="extra-info-container__right-box">
                    <div class="info-piece">
                        <h1 class="profile__header">   {{__('messages.db_birth')}}</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">{{$friend->profile->date_of_birth}}</h2>
                    </div>
                    <div class="info-piece">
                        <h1 class="profile__header">{{__('messages.specialization')}}</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">{{$friend->profile->specialization}}</h2>
                    </div>
                    <div class="info-piece">
                        <h1 class="profile__header">{{__('messages.job')}}</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">{{$friend->profile->job}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('user.layouts.fixed_layout')
@section('content')
<div class="profile-container " style="margin-top: 120px;">
    <img src="img/profile-info-2.svg" alt="profile" class="profile-illustration" />
    <div class="profile-info">
        <div class="profile-info__left-box left-box-width-fix">
            <div class="profile-info__left-box-profile-pic-box">
                <img src="{{asset('storage/'.$profile->picture)}}" alt="profile-pic" class="profile-info__left-box-profile-pic" />
                <!-- <img src="img/country.png" alt="country" class="country-picture" /> -->
            </div>

            {{!$friend_is_exist=App\Friend::where(['user_id'=> Auth::user()->id,'friend_id'=>$friend->id])}}
            {{!$friend_request=App\Friend::where(['user_id'=> $friend->id,'friend_id'=>Auth::user()->id])}}

            @if($friend_is_exist->get()->count()==0 && $friend_is_exist->get()->count()!=0 )
            <button data-userid="{{$friend->id}}" class="change-profile-pic-btn add-friend">Add Friend</button>
            @else
                @if(isset($friend_is_exist->get()->first()->accept))
                    @if($friend_is_exist->get()->first()->accept==0)
                        <button data-userid="{{$friend->id}}" class="change-profile-pic-btn add-friend">Friend Request Sent</button>
                     @else
                    <button data-userid="{{$friend->id}}" class="change-profile-pic-btn add-friend">Friends</button>
                    @endif
                @endif

            @endif




            @if($friend_request->get()->count()==0  && $friend_is_exist->get()->count()==0)
            <button data-userid="{{$friend->id}}" class="change-profile-pic-btn add-friend">Add Friend</button>
            @else
                @if(isset($friend_request->get()->first()->accept))
                    @if($friend_request->get()->first()->accept==0)
                    <button data-friend="{{$friend->id}}" class="change-profile-pic-btn accept">Accept Request</button>
                    @else
                    <button data-userid="{{$friend->id}}" class="change-profile-pic-btn add-friend">Friends</button>
                    @endif
                 @endif

            @endif









            <button class="change-profile-pic-btn btn-grn-color">
                Contact Via whatsapp
            </button>
            <button class="change-profile-pic-btn btn-prp-color">
                contact via email
            </button>
        </div>

        <div class="profile-info__right-box">
            <div class="info-piece">
                <h1 class="profile__header">{{$friend->name}}</h1>
                <div class="hr"></div>
                <h2 class="profile__subtitle">Masters</h2>
            </div>
            <div class="info-piece">
                <h1 class="profile__header">Summary</h1>
                <div class="hr"></div>
                <h2 class="profile__subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam accusamus quibusdam illum cum quia ratione iste mollitia ipsum officiis debitis, asperiores at error, impedit delectus.</h2>
            </div>
            <div class="extra-info-container">
                <div class="extra-info-container__left-box">
                    <div class="info-piece">
                        <h1 class="profile__header">Phone Number</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">+0123456789</h2>
                    </div>
                    <div class="info-piece">
                        <h1 class="profile__header">Address</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">Lorem Ipsum</h2>
                    </div>
                    <div class="info-piece">
                        <h1 class="profile__header">Gender</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">Female</h2>
                    </div>
                </div>
                <div class="extra-info-container__right-box">
                    <div class="info-piece">
                        <h1 class="profile__header">Date of birth</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">01/22/2003</h2>
                    </div>
                    <div class="info-piece">
                        <h1 class="profile__header">Specialization</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">Engineering</h2>
                    </div>
                    <div class="info-piece">
                        <h1 class="profile__header">Job</h1>
                        <div class="hr"></div>
                        <h2 class="profile__subtitle">Student</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}
@if(session()->has('success_ar') OR session()->has('success_en') )
<div class="alert alert-success" style="margin-top: 131px;">
    {{ $lang == 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

</div>
@endif
<div class="profile-container" style="padding-top:110px; height:130vh">


    <img src="/img/profile-illustration-1.svg" alt="profile" class="profile-illustration" />
    <div class="profile-info">
        <form action="{{route('user.users.update',$user->id)}}" class="profile-info" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="profile-info__left-box">
                <div class="profile-info__left-box-profile-pic-box">
                    <input type="file" name="picture" accept="image/*" onchange="showPreview(event);">
                    <img src="/storage/{{$profile->picture }}" alt="profile-pic" class="profile-info__left-box-profile-pic" style="height: 200px; height:200px" />
                </div>

                <!-- <button class="change-profile-pic-btn">Change profile pic</button> -->

                <div class="profile-input">
                    <label for="Nationality" class="profile-input__label">{{__("messages.nationality")}}</label>
                    <input type="text" value="{{$profile->nationality}}" name="nationality" id="Nationality" class="profile-input__input"  />
                </div>

                <div class="profile-input">
                    <label for="country" class="profile-input__label">{{__("messages.country")}}</label>
                    <input type="text" value="{{$profile->country}}" name="country" id="country" class="profile-input__input"  />
                </div>
                <div class="profile-input">
                    <label for="job" class="profile-input__label">{{__("messages.job")}}</label>
                    <input type="text" value="{{$profile->job}}" name="job" id="job" class="profile-input__input"  />
                </div>
            </div>
            <div class="profile-info__middle-box">
                <div class="profile-input">
                    <label for="fullname" class="profile-input__label">{{__("messages.full_name")}}</label>
                    <input type="text" value="{{$profile->fullname}}" name="fullname" id="fullname" class="profile-input__input"  />
                </div>
                <div class="profile-input">
                    <label for="email" class="profile-input__label">{{__("messages.email")}}</label>
                    <input type="email" name="email" id="email" class="profile-input__input" value="{{$user->email}}" />
                </div>
                <div class="profile-input">
                    <label for="phone-number" class="profile-input__label">{{__("messages.phone")}}</label>
                    <input type="text" value="{{$profile->phone}}" name="phone" id="phone-number" class="profile-input__input" />
                </div>
                <div class="profile-input">
                    <label for="date-of-birth" class="profile-input__label">{{__("messages.db_of_birth")}}</label>
                    <input type="date" value="{{$profile->date_of_birth}}" name="date_of_birth" id="date_of_birth" class="profile-input__input"  />
                </div>
                <div class="profile-input">
                    <label for="job" class="profile-input__label">{{__("messages.gender")}}</label>
                    <div class="gender-options">
                        <div class="options">
                            <input type="radio" id="male" name="gender" value="male" <?php if ($profile->gender == 'male') echo 'checked' ?> />
                            <label for="male" class="profile-input__raido-label">{{__("messages.male")}}</label>
                        </div>
                        <div class="options">
                            <input type="radio" id="female" name="gender" value="female" <?php if ($profile->gender == 'female') echo 'checked' ?> />
                            <label for="male" class="profile-input__raido-label">{{__("messages.female")}}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-info__right-box">
                <div class="profile-input">
                    <label for="education_level" class="profile-input__label">{{__("messages.education_level")}}</label>
                    <input type="text" value="{{$profile->education_level}}" name="education_level" id="education_level" class="profile-input__input" />
                </div>
                <div class="profile-input">
                    <label for="specialization" class="profile-input__label">{{__("messages.specialization")}}</label>
                    <input type="text" value="{{$profile->specialization}}" name="specialization" id="specialization" class="profile-input__input"  />
                </div>
                <div class="profile-input">
                    <label for="address" class="profile-input__label">{{__("messages.address")}}</label>
                    <input type="text" value="{{$profile->address}}" name="address" id="address" class="profile-input__input" />
                </div>
                <div class="profile-input">
                    <label for="password" class="profile-input__label">{{__("messages.password")}}</label>
                    <input type="password" name="password" id="password" class="profile-input__input" placeholder="{{__('messages.password')}}..." />
                </div>
                <div class="profile-input">
                    <label for="personal-description" class="profile-input__label">{{__("messages.personal_desc")}}</label>

                    <textarea id="personal-description" name="personal_desc" rows="6" cols="50" class="profil-input__textarea" >{{$profile->personal_desc}}</textarea>
                </div>
                <button class="profile-submit-btn">{{__("messages.save")}}</button>
            </div>

        </form>
    </div>
</div>
@endsection

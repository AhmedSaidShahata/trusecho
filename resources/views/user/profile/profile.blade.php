@extends('layouts.app')
@section('content')
    <div class="profile-container">
      <img
        src="/img/profile-illustration-1.svg"
        alt="profile"
        class="profile-illustration"
      />
      <div class="profile-info">
        <form action="{{route('user.update',$user->id)}}" class="profile-info" enctype="multipart/form-data" method="POST">
            @csrf
          <div class="profile-info__left-box">
            <div class="profile-info__left-box-profile-pic-box">

              <img
                src="/{{$profile->picture }}"
                alt="profile-pic"
                class="profile-info__left-box-profile-pic"

              />
            </div>
            <input type="file" name="picture">
            <!-- <button class="change-profile-pic-btn">Change profile pic</button> -->

            <div class="profile-input">
              <label for="Nationality" class="profile-input__label"
                >Nationality</label
              >
              <input
                type="text"
                value="{{--$profile->country--}}"
                name="country"
                id="Nationality"
                class="profile-input__input"
            placeholder="Type your country.."
              />
            </div>
            <div class="profile-input">
              <label for="job" class="profile-input__label">Job</label>
              <input
                type="text"
                value="{{--$profile->job--}}"
                name="job"
                id="job"
                class="profile-input__input"
                placeholder="Job..."
              />
            </div>
          </div>
          <div class="profile-info__middle-box">
            <div class="profile-input">
              <label for="fullname" class="profile-input__label"
                >Full name</label
              >
              <input
                type="text"
                value="{{--$profile->fullname--}}"
                name="fullname"
                id="fullname"
                class="profile-input__input"
                placeholder="Full name..."
              />
            </div>
            <div class="profile-input">
              <label for="email" class="profile-input__label">Email</label>
              <input
                type="email"
                name="email"
                id="email"
                class="profile-input__input"
                placeholder="Email..."
                value="{{$user->email}}"
              />
            </div>
            <div class="profile-input">
              <label for="phone-number" class="profile-input__label"
                >Phone number</label
              >
              <input
                type="text"
                value="{{--$profile->phone--}}"
                name="phone"
                id="phone-number"
                class="profile-input__input"
                placeholder="Phone number..."
              />
            </div>
            <div class="profile-input">
              <label for="date-of-birth" class="profile-input__label"
                >Date of birth</label
              >
              <input
                type="date"
                value="{{--$profile->date_of_birth--}}"
                name="date_of_birth"
                id="date_of_birth"
                class="profile-input__input"
                placeholder="MM/DD/YYYY..."
              />
            </div>
            <div class="profile-input">
              <label for="job" class="profile-input__label">Gender</label>
              <div class="gender-options">
                <div class="options">
                  <input type="radio" id="male" name="gender" value="{{$profile->gender}}" />
                  <label for="male" class="profile-input__raido-label"
                    >Male</label
                  >
                </div>
                <div class="options">
                  <input
                    type="radio"
                    id="female"
                    name="gender"
                    value="{{--$profile->gender--}}"
                  />
                  <label for="male" class="profile-input__raido-label"
                    >Female</label>
                </div>
              </div>
            </div>
          </div>
          <div class="profile-info__right-box">
            <div class="profile-input">
                <label for="education-level" class="profile-input__label"
                  >Educational Level</label
                >
                <input
                  type="text"
                  name="education_level"
                  id="education-level"
                  class="profile-input__input"
                  placeholder="Educational level..."
                />
              </div>
              <div class="profile-input">
                <label for="specialization" class="profile-input__label">Specialization</label>
                <input
                  type="text"
                  name="specialization"
                  id="specialization"
                  class="profile-input__input"
                  placeholder="Specialization..."
                />
              </div>
              <div class="profile-input">
                <label for="address" class="profile-input__label"
                  >Address</label
                >
                <input
                  type="text"
                  name="address"
                  id="address"
                  class="profile-input__input"
                  placeholder="Address..."
                />
              </div>
              <div class="profile-input">
                <label for="password" class="profile-input__label"
                  >Password</label
                >
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="profile-input__input"
                  placeholder="Password..."
                />
              </div>
              <div class="profile-input">
                <label for="personal-description" class="profile-input__label"
                  >personal-desription</label
                >

                <textarea id="personal-description" value="{{--$profile->personal_desc}--}" name="personal_desc" rows="6" cols="50" class="profil-input__textarea" placeholder="Personal Description"></textarea>
              </div>
              <button class="profile-submit-btn">Save</button>
          </div>

        </form>
      </div>
    </div>
@endsection
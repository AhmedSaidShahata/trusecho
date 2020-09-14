@extends('user.layouts.fixed_layout')
@section('content')
    <div class="thanks-for-applying">
      <div class="background-illustration-box">
        <img
          src="{{asset('img/bg-wave.svg')}}"
          alt="submit-successfully"
          class="background-illustration"
        />
      </div>
      <div class="thanks-for-applying__content-box">
        <div class="left-container">
          <h1 class="left-container__header">
            Your application is submitted carefully
          </h1>
          <p class="left-container__paragraph">
            We will review your application and contact you shortly
          </p>
          <a href="{{route('user.homepages.index')}}" class="home-page-btn">homepage</a>
        </div>
        <div class="right-container">
          <div class="right-container__illustration-box">
              <img src="{{asset('img/submit-successfully.svg')}}" alt="submit-successfully" class="right-container__illustration">
          </div>
        </div>
      </div>
    </div>
    @endsection

@extends('layouts.app')

@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}



<div class="fluid-containter sign-up-3">
    <img src="{{asset('img/sign-up-3-left.svg')}}" alt="illustration" class="position-fix-left">
    <img src="{{asset('img/sign-up-3-right.svg')}}" alt="illustration" class="position-fix-right">
    <div class="sign-up-box">
        <h1 class="sign-up-box__header">{{__('messages.phone_verification')}}</h1>
        <div class="horizontal-line"></div>
        <form action="{{route('user.verify')}}" class="sign-up-3__centeral" method="post">
            @if(session()->has('error_ar') OR session()->has('error_en') )
            <div class="alert alert-danger">
                {{ $lang == 'ar' ? session()->get('error_ar')   :  session()->get('error_en') }}
            </div>
            @endif
            @csrf
            <h2 class="verification-header">{{__('messages.verification_code')}}</h2>
            <p class="verification-paragraph">{{__('messages.enter_code')}}</p>
            <p class="verification-phone-number">{{$phone}}</p>
            <input type="text" name="code" id="code" placeholder="{{__('messages.please_code')}}..." class="verification-input">
            <button class="sign-up-box__input-submit-btn sign-up-3__btn" type="submit">{{__('messages.submit')}}</button>

    </div>


</div>

@endsection

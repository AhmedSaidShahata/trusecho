@extends('layouts.app')

@section('content')

<div class="fluid-containter sign-up-3">
    <img src="{{asset('img/sign-up-3-left.svg')}}" alt="illustration" class="position-fix-left">
    <img src="{{asset('img/sign-up-3-right.svg')}}" alt="illustration" class="position-fix-right">
    <div class="sign-up-box">
        <h1 class="sign-up-box__header">{{__('messages.phone_verification')}}</h1>
        <div class="horizontal-line"></div>
        <form action="#" class="sign-up-3__centeral">
            <h2 class="verification-header">{{__('messages.verification_code')}}</h2>
            <p class="verification-paragraph">{{__('messages.enter_code')}}</p>
            <p class="verification-phone-number">{{$phone}}</p>
            <input type="text" name="code" id="code" placeholder="{{__('messages.please_code')}}..." class="verification-input">
            <button class="sign-up-box__input-submit-btn sign-up-3__btn" type="button">{{__('messages.submit')}}</button>

    </div>
</div>

@endsection

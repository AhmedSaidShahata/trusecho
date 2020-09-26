@extends('layouts.app')

@section('content')



<div class="fluid-containter">
    <img src="{{asset('img/sign-up-1-left.svg')}}" alt="illustration" class="fluid-containter__left-illustration">
    <img src="{{asset('img/sign-up-1-right.svg')}}" alt="illustration" class="fluid-containter__right-illustration">
    <div class="sign-up-box">
        <h1 id="my_reg" class="sign-up-box__header">{{__('messages.register')}}</h1>
        <div class="horizontal-line"></div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="sign-up-box__input">
                <label id ="my_name" class="sign-up-box__input-label">
                    {{__('messages.name')}}
                </label>
                <input id="name" type="text" class="sign-up-box__input-field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="sign-up-box__input">
                <label id="my_email" class="sign-up-box__input-label">{{__('messages.email')}}</label>
                <input id="email" name="email" type="email" class="sign-up-box__input-field @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="sign-up-box__input">
                <label id="my_password" class="sign-up-box__input-label">   {{__('messages.password')}}</label>

                <input id="password" type="password" class="sign-up-box__input-field  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


            </div>
            <div class="sign-up-box__input">
                <label id="my_confirm_password" class="sign-up-box__input-label">{{__('messages.confirm_password')}}</label>
                <input id="password-confirm" type="password" class="sign-up-box__input-field " name="password_confirmation" required autocomplete="new-password">
            </div>
            <button id="my_sign" class="sign-up-box__input-submit-btn" type="submit">{{__('messages.submit')}}</button>
        </form>
        <span id="my_or" class="or-word">OR</span>
        <a id="my_facebook" href="{{route('facebook.login')}}" class="social-media-sign fb">{{__('messages.facebook_login')}}</a>
        <a id="my_google" href="{{route('google.login')}}" class="social-media-sign g">{{__('messages.google_login')}}</a>
    </div>
</div>



@endsection

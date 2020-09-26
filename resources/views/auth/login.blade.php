@extends('layouts.app')

@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}

<div class="fluid-containter">
    <img src="{{asset('img/sign-up-1-left.svg')}}" alt="illustration" class="fluid-containter__left-illustration">
    <img src="{{asset('img/sign-up-1-right.svg')}}" alt="illustration" class="fluid-containter__right-illustration">
    <div class="sign-up-box">
        <h1 id="my_sign" class="sign-up-box__header">{{__('messages.sign_in')}}</h1>
        <div class="horizontal-line"></div>
        <form method="POST" action="{{ route('login') }}">
        @if(session()->has('success_ar') OR session()->has('success_en') )
            <div class="alert alert-success">
                {{ $lang == 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}
            </div>
            @endif
            @csrf
            <div class="sign-up-box__input">
                <label id="my_email" for="email" class="sign-up-box__input-label">{{__('messages.email')}}</label>
                <input id="email" type="email" class="sign-up-box__input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="sign-up-box__input">
                <label id="my_password" for="password" class="sign-up-box__input-label">{{__('messages.password')}}</label>

                <input id="password" placeholder="" type="password" class="sign-up-box__input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert" style="font-size:100%">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <input style="margin-top: 10px;" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span id="my_remember" style="font-size:14px">{{__('messages.remember_me')}}</span>

            <button id="my_sigin" class="sign-up-box__input-submit-btn sign-inbtn" type="submit">{{__('messages.sign_in')}}</button>

            @if (Route::has('password.request'))
            <!-- <a class="forgot-password" href="{{ route('password.request') }}">

            </a> -->
            @endif
        </form>
        <span id="my_or" class="or-word">{{__('messages.or')}}</span>
        <a id="my_facebook" href="{{route('facebook.login')}}" class="social-media-sign fb">{{__('messages.facebook_login')}}</a>
        <a id="my_google" href="{{route('google.login')}}" class="social-media-sign g">{{__('messages.google_login')}}</a>
    </div>
</div>



@endsection

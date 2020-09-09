@extends('layouts.app')

@section('content')

<div class="fluid-containter">
    <img src="img/sign-up-1-left.svg" alt="illustration" class="fluid-containter__left-illustration">
    <img src="img/sign-up-1-right.svg" alt="illustration" class="fluid-containter__right-illustration">
    <div class="sign-up-box">
        <h1 id="my_sign" class="sign-up-box__header">Sign in</h1>
        <div class="horizontal-line"></div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="sign-up-box__input">
                <label id="my_email" for="email" class="sign-up-box__input-label">Email</label>
                <input id="email" type="email" class="sign-up-box__input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="sign-up-box__input">
                <label id="my_password" for="password" class="sign-up-box__input-label">Password</label>

                <input id="password" placeholder="Enter your password..." type="password" class="sign-up-box__input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert" style="font-size:100%">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <input style="margin-top: 10px;" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span id="my_remember" style="font-size:14px">remeber me</span>

            <button id="my_sigin" class="sign-up-box__input-submit-btn sign-inbtn" type="submit">Sign in</button>

            @if (Route::has('password.request'))
            <!-- <a class="forgot-password" href="{{ route('password.request') }}">

            </a> -->
            @endif
        </form>
        <span id="my_or" class="or-word">OR</span>
        <a id="my_facebook" href="{{route('facebook.login')}}" class="social-media-sign fb">facebook</a>
        <a id="my_google" href="{{route('google.login')}}" class="social-media-sign g">Google</a>
    </div>
</div>




<script>
    let lang = localStorage.getItem('lang')
    let email = document.getElementById("my_email");
    let remeber = document.getElementById("my_remember");
    let or = document.getElementById("my_or");
    let password = document.getElementById("my_password");
    let sigin = document.getElementById("my_sigin");
    let facebook = document.getElementById("my_facebook");
    let google = document.getElementById("my_google");
    let my_sign = document.getElementById("my_sign");




    if (lang == '_ar') {
        email.innerHTML = 'البريد الالكترونى';
        remeber.innerHTML = 'تذكرنى';
        or.innerHTML = 'أو';
        password.innerHTML = 'رقم المرور';
        sigin.innerHTML = 'دخول';
        facebook.innerHTML = 'التسجيل عبر حسابك على الفيسبوك';
        google.innerHTML = 'التسجيل عبر حسابك على جوجل';
        my_sign.innerHTML = 'تسجيل الدخول';
    } else {
        email.innerHTML = 'Email';
        remeber.innerHTML = 'ٌRemember Me';
        my_or.innerHTML = 'OR';
        password.innerHTML = 'Password';
        sigin.innerHTML = 'Sign In';
        facebook.innerHTML = 'FACEBOOK';
        google.innerHTML = 'GOOGLE';
        my_sign.innerHTML = 'Sign In';

    }
</script>

@endsection

@extends('layouts.app')

@section('content')


<div class="fluid-containter">
    <img src="img/sign-up-1-left.svg" alt="illustration" class="fluid-containter__left-illustration">
    <img src="img/sign-up-1-right.svg" alt="illustration" class="fluid-containter__right-illustration">
    <div class="sign-up-box">
        <h1 class="sign-up-box__header">Sign in</h1>
        <div class="horizontal-line"></div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="sign-up-box__input">
                <label for="email" class="sign-up-box__input-label">Email</label>
                <input id="email" type="email" class="sign-up-box__input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="sign-up-box__input">
                <label for="password" class="sign-up-box__input-label">Password</label>

                <input id="password" placeholder="Enter your password..." type="password" class="sign-up-box__input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <button class="sign-up-box__input-submit-btn sign-inbtn" type="submit">Sign in</button>

            @if (Route::has('password.request'))
            <a class="forgot-password" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </form>
        <span class="or-word">OR</span>
        <a href="{{route('facebook.login')}}" class="social-media-sign fb">facebook</a>
        <a href="#" class="social-media-sign g">Google</a>
    </div>
</div>

@endsection

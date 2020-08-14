@extends('layouts.app')

@section('content')


<div class="fluid-containter">
    <img src="img/sign-up-1-left.svg" alt="illustration" class="fluid-containter__left-illustration">
    <img src="img/sign-up-1-right.svg" alt="illustration" class="fluid-containter__right-illustration">
    <div class="sign-up-box">
        <h1 class="sign-up-box__header">Sign Up</h1>
        <div class="horizontal-line"></div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="sign-up-box__input">
                <label for="email" class="sign-up-box__input-label">Name</label>
                <input id="name" type="text" class="sign-up-box__input-field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="sign-up-box__input">
                <label for="email" class="sign-up-box__input-label">Email</label>
                <input id="email" name="email" type="email" class="sign-up-box__input-field @error('email') is-invalid @enderror" placeholder="Email..." value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="sign-up-box__input">
                <label for="password" class="sign-up-box__input-label">Password</label>

                <input id="password" type="password" class="sign-up-box__input-field  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


            </div>
            <div class="sign-up-box__input">
                <label for="confirm-password" class="sign-up-box__input-label">Confirm password</label>
                <input id="password-confirm" type="password" class="sign-up-box__input-field " name="password_confirmation" required autocomplete="new-password">
            </div>
            <button class="sign-up-box__input-submit-btn" type="submit">Submit</button>
        </form>
        <span class="or-word">OR</span>
        <a href="#" class="social-media-sign fb">facebook</a>
        <a href="#" class="social-media-sign g">Google</a>
    </div>
</div>
@endsection

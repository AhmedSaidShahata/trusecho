@extends('layouts.app')

@section('content')








<div class="fluid-containter">
    <img src="img/sign-up-1-left.svg" alt="illustration" class="fluid-containter__left-illustration">
    <img src="img/sign-up-1-right.svg" alt="illustration" class="fluid-containter__right-illustration">
    <div class="sign-up-box">
        <h1 id="my_reg" class="sign-up-box__header"></h1>
        <div class="horizontal-line"></div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="sign-up-box__input">
                <label id ="my_name" class="sign-up-box__input-label">
                    name
                </label>
                <input id="name" type="text" class="sign-up-box__input-field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="sign-up-box__input">
                <label id="my_email" class="sign-up-box__input-label">Email</label>
                <input id="email" name="email" type="email" class="sign-up-box__input-field @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="sign-up-box__input">
                <label id="my_password" class="sign-up-box__input-label">Password</label>

                <input id="password" type="password" class="sign-up-box__input-field  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


            </div>
            <div class="sign-up-box__input">
                <label id="my_confirm_password" class="sign-up-box__input-label">Confirm password</label>
                <input id="password-confirm" type="password" class="sign-up-box__input-field " name="password_confirmation" required autocomplete="new-password">
            </div>
            <button id="my_sign" class="sign-up-box__input-submit-btn" type="submit">Submit</button>
        </form>
        <span id="my_or" class="or-word">OR</span>
        <a id="my_facebook" href="{{route('facebook.login')}}" class="social-media-sign fb">facebook</a>
        <a id="my_google" href="{{route('google.login')}}" class="social-media-sign g">Google</a>
    </div>
</div>

<script>
    let lang = localStorage.getItem('lang')
    let email = document.getElementById("my_email");
    lang == '_ar' ? email.innerHTML = 'البريد الالكترونى' : email.innerHTML = 'Email'

    let name = document.getElementById("my_name");
    lang == '_ar' ? name.innerHTML = 'الأسم' : name.innerHTML = 'Name'

    let  password = document.getElementById("my_password");
    lang == '_ar' ?  password.innerHTML = 'رقم المرور' :  password.innerHTML = 'Password'

    let  confirm_pass = document.getElementById("my_confirm_password");
    lang == '_ar' ?  confirm_pass.innerHTML = 'اعادة رقم المرور' :  confirm_pass.innerHTML = 'Confirm Password'

    let facebook = document.getElementById("my_facebook");
    lang == '_ar' ? facebook.innerHTML = 'التسجيل عبر حسابك على الفيسبوك' : facebook.innerHTML = 'FACEBOOK'

    let google = document.getElementById("my_google");
    lang == '_ar' ? google.innerHTML = 'التسجيل عبر حسابك على جوجل' : google.innerHTML = 'GOOGLE'

    let sign = document.getElementById("my_sign");
    lang == '_ar' ? sign.innerHTML = 'تسجيل' : sign.innerHTML = 'Submit'

    let or = document.getElementById("my_or");
    lang == '_ar' ? or.innerHTML = 'أو' : or.innerHTML = 'OR'

    let register = document.getElementById("my_reg");
    lang == '_ar' ? register.innerHTML = 'تسجيل عضوية' : register.innerHTML = 'Register'


</script>

@endsection

@extends('layouts.app')

@section('content')

@section('style_phone')
<!-- <link rel="stylesheet" href="{{asset('css/pidie-0.0.8.css')}}" /> -->
<link rel="stylesheet" href="{{asset('css/intlTelInput.min.css')}}">
<link rel="stylesheet" href="{{asset('css/demo.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
@endsection

<div class="fluid-containter">
    <img src="{{asset('img/sign-up-2.svg')}}" alt="illustration" class="fluid-containter__middle-illustration">
    <div class="sign-up-box form-flex">
        <h1 class="sign-up-box__header">{{__('messages.sign_up')}}</h1>
        <div class="horizontal-line hr-width-fix"></div>
        <form action="{{route('user.regs.update',Auth::user()->id)}}" method="post" class="sign-up-box__form">
            @csrf
            @method('PUT')


            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
            <div class="sign-up-box__input input-width-fix">
                <label for="First name" class="sign-up-box__input-label">{{__('messages.first_name')}}</label>
                <input required type="First-name" id="First-name" name="first_name" class="sign-up-box__input-field" placeholder="{{__('messages.first_name')}}..." />
            </div>
            <div class="sign-up-box__input input-width-fix">
                <label for="last-name" class="sign-up-box__input-label">{{__('messages.last_name')}}</label>
                <input required type="last-name" id="last-name" name="last_name" class="sign-up-box__input-field" placeholder="{{__('messages.last_name')}}..." />
            </div>
            <div class="sign-up-box__input input-width-fix my-phone">
                <label for="phone-number" class="sign-up-box__input-label">{{__('messages.phone_number')}}</label>
                <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                <span id="valid-msg" class="hide">
                    Valid
                    <i class="fas fa-check-circle"></i>
                </span>
                <span id="error-msg" class="hide"></span>
            </div>

            <div class="sign-up-box__input input-width-fix">
                <label for="nationality" class="sign-up-box__input-label">{{__('messages.nationality')}}</label>
                <input required type="text" id="nationality" name="nationality" class="sign-up-box__input-field" placeholder="{{__('messages.nationality')}}..." />
            </div>
            <div class="profile-input" style="font-size: 16px; margin-top:10px;">
                <label for="job" class="profile-input__label">{{__("messages.gender")}}</label>
                <div class="gender-options">
                    <div class="options" style="font-size: 15px;">
                        <input type="radio" id="male" name="gender" value="male" />
                        <label for="male" class="profile-input__raido-label">{{__("messages.male")}}</label>
                    </div>
                    <div class="options" style="font-size: 15px;">
                        <input type="radio" id="female" name="gender" value="female" />
                        <label for="male" class="profile-input__raido-label">{{__("messages.female")}}</label>
                    </div>
                </div>
            </div>
            <div class="sign-up-box__input input-width-fix">
                <label for="education" class="sign-up-box__input-label">{{__('messages.educational_degree')}}</label>
                <input required type="text" id="education" name="education_level" class="sign-up-box__input-field" placeholder="{{__('messages.educational_degree')}}..." />
            </div>
            <div class="sign-up-box__input input-width-fix">
                <label for="date-of-birth" class="sign-up-box__input-label">{{__('messages.db_of_birth')}}</label>
                <input required type="date" id="date-of-birth" name="date_of_birth" class="sign-up-box__input-field" />
            </div>
            <div class="sign-up-box__input input-width-fix">
                <label for="address" class="sign-up-box__input-label">{{__('messages.address')}}</label>
                <input required type="text" id="address" name="address" class="sign-up-box__input-field" placeholder="{{__('messages.address')}}..." />
            </div>
            <div class="sign-up-box__input input-width-fix">
                <label for="specialization" class="sign-up-box__input-label">{{__('messages.specialization')}}</label>
                <input required type="text" id="specialization" name="specialization" class="sign-up-box__input-field" placeholder="{{__('messages.specialization')}}..." />
            </div>
            <button class="sign-up-box__input-submit-btn btn-width-fix" type="submit">{{__('messages.next')}}</button>
        </form>
    </div>
</div>
@section('script_phone')
<script src="{{asset('js/intlTelInput.min.js')}}"></script>
<script>
    var input = document.querySelector("#phone");
    var validMsg = document.querySelector('#valid-msg');
    var errorMsg = document.querySelector('#error-msg');
    var errorMap = ["Invalid number", "Invalid country code", "Invalid number", "Invalid number", "Invalid number"]

    var reset = function() {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    }



    var iti = window.intlTelInput(input, {
        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
        hiddenInput: "full_number",
        // initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        separateDialCode: true,
        utilsScript: "/js/utils.js",
    });


 input.addEventListener('blur', function() {
        reset();

    if (input.value.trim()) {
        if (iti.isValidNumber()) {
            validMsg.classList.remove("hide");
        } else {
            input.classList.add("error");
            var errorCode = iti.getValidationError();
            errorMsg.innerHTML = '<i class="fas fa-exclamation-triangle"></i>'+ errorMap[errorCode] ;
            errorMsg.classList.remove("hide");
        }
    }
})

input.addEventListener('change',reset);
input.addEventListener('keyup',reset);
</script>
@endsection



@endsection

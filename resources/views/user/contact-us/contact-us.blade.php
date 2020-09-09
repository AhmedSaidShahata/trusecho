@extends('user.layouts.fixed_layout')
@section('content')
<div class="contact-us-section">
    <h1 class="contact-us-section__header">{{__('messages.get_touch')}}</h1>
    <div class="contact-us-section__info">
        <div class="contact-us-section__info-content">
            <h1 class="contact-us-section__sub-header">
            {{__('messages.feel_free')}}
            </h1>
            <p class="contact-us-section__paragraph">
            {{__('messages.we_love')}}
            </p>
        </div>

        <img src="{{asset('img/contact-us.svg')}}" alt="organization" class="contact-us-section__illustration" />
    </div>
</div>
<div class="contact-us-form">
    <div class="contact-us-form__container">
        <div class="contact-us-form__container-left">
            <h1 class="left-header">{{__('messages.drop_message')}}</h1>

            <form method="post" action="{{route('user.contacts.store')}}"  >
            @csrf
                <div class="input-field">
                    <label for="fullname">{{__('messages.full_name')}}</label>
                    <input type="text" name="fullname" id="fullname" required />
                </div>
                <div class="input-field">
                    <label for="email">{{__('messages.email')}}</label>
                    <input type="email" name="email" id="email"  required />
                </div>
                <div class="input-field">
                    <label for="message">{{__('messages.message')}}</label>
                    <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                </div>
                <input type="submit" value="{{__('messages.send_now')}}" class="send-now-btn">
            </form>
        </div>
        <div class="contact-us-form__container-right">
            <h1 class="right-header">{{__('messages.contact_info')}}</h1>
            <div class="contact-info">
                <img src="{{asset('img/pin.svg')}}" alt="location" class="contact-info__icon" />
                <p class="contact-info__paragraph">
                    quis nostrud exercitation ullamco laboris nisi.
                </p>
            </div>
            <div class="contact-info">
                <img src="{{asset('img/phone.svg')}}" alt="phone" class="contact-info__icon" />
                <p class="contact-info__paragraph">+0123456789</p>
            </div>
            <div class="contact-info push-down">
                <img src="{{asset('img/mail.svg')}}" alt="mail" class="contact-info__icon" />
                <p class="contact-info__paragraph">email@email.com</p>
            </div>
            <div class="contact-us-social-media">
                <img src="{{asset('img/facebook-white-contact.svg')}}" alt="facebook" class="contact-us-social-media-icon">
                <img src="{{asset('img/twitter-white.svg')}}" alt="twitter" class="contact-us-social-media-icon">
                <img src="{{asset('img/instagram-white.svg')}}" alt="instgram" class="contact-us-social-media-icon">
                <img src="{{asset('img/linkedin-white.svg')}}" alt="linkedin" class="contact-us-social-media-icon">
                <img src="{{asset('img/telegram-white.svg')}}" alt="telegram-white" class="contact-us-social-media-icon">
            </div>
        </div>
    </div>
</div>

@endsection

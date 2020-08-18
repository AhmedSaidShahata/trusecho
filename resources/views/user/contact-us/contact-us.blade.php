@extends('user.layouts.fixed_layout')
@section('content')
<div class="contact-us-section">
    <h1 class="contact-us-section__header">Get in touch</h1>
    <div class="contact-us-section__info">
        <div class="contact-us-section__info-content">
            <h1 class="contact-us-section__sub-header">
                Feel free to get in touch
            </h1>
            <p class="contact-us-section__paragraph">
                We would love to hear from you
            </p>
        </div>

        <img src="img/contact-us.svg" alt="organization" class="contact-us-section__illustration" />
    </div>
</div>
<div class="contact-us-form">
    <div class="contact-us-form__container">
        <div class="contact-us-form__container-left">
            <h1 class="left-header">Drop a message</h1>

            <form method="post" action="{{route('user.contacts.store')}}"  >
            @csrf
                <div class="input-field">
                    <label for="fullname">Full name</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Full name..." required />
                </div>
                <div class="input-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email..." required />
                </div>
                <div class="input-field">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Message..." required></textarea>
                </div>
                <input type="submit" value="Send Now" class="send-now-btn">
            </form>
        </div>
        <div class="contact-us-form__container-right">
            <h1 class="right-header">Contact Info</h1>
            <div class="contact-info">
                <img src="img/pin.svg" alt="location" class="contact-info__icon" />
                <p class="contact-info__paragraph">
                    quis nostrud exercitation ullamco laboris nisi.
                </p>
            </div>
            <div class="contact-info">
                <img src="img/phone.svg" alt="phone" class="contact-info__icon" />
                <p class="contact-info__paragraph">+0123456789</p>
            </div>
            <div class="contact-info push-down">
                <img src="img/mail.svg" alt="mail" class="contact-info__icon" />
                <p class="contact-info__paragraph">email@email.com</p>
            </div>
            <div class="contact-us-social-media">
                <img src="img/facebook-white-contact.svg" alt="facebook" class="contact-us-social-media-icon">
                <img src="img/twitter-white.svg" alt="twitter" class="contact-us-social-media-icon">
                <img src="img/instagram-white.svg" alt="instgram" class="contact-us-social-media-icon">
                <img src="img/linkedin-white.svg" alt="linkedin" class="contact-us-social-media-icon">
                <img src="img/telegram-white.svg" alt="telegram-white" class="contact-us-social-media-icon">
            </div>
        </div>
    </div>
</div>

@endsection

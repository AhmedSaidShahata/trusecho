@extends('user.layouts.fixed_layout')
@section('content')
<div class="thanks-for-applying">
    <div class="background-illustration-box">
        <img src="img/bg-wave.svg" alt="submit-successfully" class="background-illustration" />
    </div>
    <div class="thanks-for-applying__content-box">
        <div class="left-container">
            <h1 class="left-container__header">
                successfully Appling job
            </h1>
            <p class="left-container__paragraph">
                We received your message and will get
                back to you as soon as possible
            </p>
            <a href="home-page.html" class="home-page-btn">homepage</a>
        </div>
        <div class="right-container">
            <div class="right-container__illustration-box">
                <img src="img/thanks-for-contacting-us.svg" alt="submit-successfully" class="right-container__illustration">
            </div>
        </div>
    </div>
</div>
@endsection

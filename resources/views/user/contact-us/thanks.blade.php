@extends('user.layouts.fixed_layout')
@section('content')
<div class="thanks-for-applying">
    <div class="background-illustration-box">
        <img src="{{asset('img/bg-wave.svg')}}" alt="submit-successfully" class="background-illustration" />
    </div>
    <div class="thanks-for-applying__content-box">
        <div class="left-container" style="z-index: 9999;">
            <h1 class="left-container__header">
                {{__('messages.thanks_contact')}}
            </h1>
            <p class="left-container__paragraph">
                {{__('messages.recive_msg')}}
            </p>
            <a href="{{route('user.homepages.index')}}" class="home-page-btn">

            {{__('messages.home_pg')}}

            </a>
        </div>
        <div class="right-container">
            <div class="right-container__illustration-box">
                <img src="{{asset('img/thanks-for-contacting-us.svg')}}" alt="submit-successfully" class="right-container__illustration" >
            </div>
        </div>
    </div>
</div>
@endsection

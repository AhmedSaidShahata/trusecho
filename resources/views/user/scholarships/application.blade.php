@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang='_'.LaravelLocalization::getCurrentLocale()}}
<div class="apply-container-bg" style="height: auto;">
    <div class="apply-illustration-box">
        <img src="{{asset('img/apply-throug-truescho-1.svg')}}" alt="illustration" class="apply-illustration" />
    </div>
    <h1 class="apply__header">{{__('messages.apply_trescho')}}</h1>
    <div class="apply-underline"></div>
  <p style="font-size: 20px;"> {{$scholarship->title}}</p>
    <form class="apply-content-box" method="POST" action="{{route('user.appscholars.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="input u-margin-bottom-xsmall u-margin-right-large">

            <input hidden type="text" name="scholar_id" value="{{$scholarship->id}}" class="popup__input-style" placeholder="" />
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label for="ad-post-title" class="popup__label-style">{{__('messages.full_name')}} </label>
            <input required type="text" id="ad-post-title" name="fullname" class="popup__input-style" placeholder="{{__('messages.answer')}}" />
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label class="popup__label-style">
                {{__('messages.nationality')}}
            </label>
            <input required type="text" name="nationality" class="popup__input-style" placeholder="{{__('messages.answer')}}" />
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label for="email" class="popup__label-style">
                {{__('messages.email')}}
            </label>
            <input required type="email" id="email" name="email" class="popup__input-style" placeholder="{{__('messages.answer')}}" />
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label for="phone-number" class="popup__label-style">
                {{__('messages.phone_number')}}
            </label>
            <input required type="text" id="phone-number" name="phone" class="popup__input-style" placeholder="{{__('messages.answer')}}" />
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label for="residential-address" class="popup__label-style">{{__('messages.residental_address')}} </label>
            <input required type="text" id="residential-address" name="address" class="popup__input-style" placeholder="{{__('messages.answer')}}" />
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label for="father-status" class="popup__label-style">
                {{__('messages.father_question')}}
            </label>
            <input required type="text" id="father-status" name="father_status" class="popup__input-style" placeholder="{{__('messages.answer')}}" />
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label for="mother-status" class="popup__label-style">
                {{__('messages.mother_question')}}
            </label>
            <input required type="text" id="mother_status" name="mother_status" class="popup__input-style" placeholder="{{__('messages.answer')}}" />
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label for="siblings-number" class="popup__label-style">{{__('messages.siblings_question')}} </label>
            <input type="text" id="siblings-number" name="siblings" class="popup__input-style" placeholder="{{__('messages.answer')}}" />
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large flex-coloum">
            <label for="scientifc-degree" class="popup__label-style">{{__('messages.scientific_question')}} </label>
            <button type="button" class="scientific-selection degree">{{__('messages.bechelor_degree')}}</button>
            <button type="button" class="scientific-selection degree">{{__('messages.masters_degree')}}</button>
            <button type="button" class="scientific-selection degree">{{__('messages.phd_degree')}}</button>
            <input required type="hidden" name="degree" value="">
        </div>
        <input type="submit" class="continue" style="width: auto;" value="{{__('messages.continue')}}">
    </form>
</div>
@endsection

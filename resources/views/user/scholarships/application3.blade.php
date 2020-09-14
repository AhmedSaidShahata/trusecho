@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang='_'.LaravelLocalization::getCurrentLocale()}}
<div class="apply-container-bg" style="height: auto;">
    <div class="apply-illustration-box">
        <img src="{{asset('img/apply-throug-truescho-1.svg')}}" alt="illustration" class="apply-illustration" />
    </div>
    <h1 class="apply__header">{{__('messages.apply_trescho')}}</h1>
    <div class="apply-underline"></div>
    {{__('messages.app_scholar')}}
    <form class="apply-content-box" method="POST" action="{{route('user.appscholar.store3')}}" enctype="multipart/form-data">
        @csrf
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
        <input hidden type="text" name="scholar_id" value="{{$scholar_id}}" class="popup__input-style" placeholder="" />


        </div>
        <div class="input">
                <label for="research-overview" class="popup__label-style"
                    >
                    {{__('messages.brief_overview')}}
                    </label
                >
                <textarea
                    id="research-overview"
                    name="research"
                    rows="6"
                    cols="60"
                    class="input-message"
                    placeholder="{{__('messages.answer')}}"
                >
                </textarea>
            </div>
            <div class="upload-file size-edit">
                <div class="upload-file__title-box">
                    <img
                        src="{{asset('img/adding icon.svg')}}"
                        alt="add icon"
                        class="upload-file-icon my-upload"
                    />
                    <h3 class="upload-file__title">
                    {{__('messages.proof_payment')}}
                        <input required type="file" name="payment_picture" onchange="showPreview(event);">

                    </h3>
                </div>
            </div>
            <div class="input u-margin-bottom-xsmall">
                <input
                type="checkbox"
                    id="agree"
                    name="agree"
                    value="agree"
                    class="input-checkbox accept-rules"
                />
                <label for="vehicle1" class="popup__label-style ">
                    I have carefully read all the information that contains all
                    the details of the application through the Truescho group
                    and agree to it</label
                >
            </div>
        <input disabled type="submit" class="continue " style="width: auto;" value="{{__('messages.continue')}}">
    </form>
</div>
@endsection

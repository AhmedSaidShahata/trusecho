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
    <form class="apply-content-box" method="POST" action="{{route('user.appscholar.store2')}}" enctype="multipart/form-data">
        @csrf
        <div class="input u-margin-bottom-xsmall u-margin-right-large">

            <input hidden type="text" name="scholar_id" value="{{$scholar_id}}" class="popup__input-style" placeholder="" />
           
        </div>


        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label for="disred-speci" class="popup__label-style">{{__('messages.desire_specilize')}}</label>
            <textarea id="disred-speci" name="specialization" rows="6" cols="40" class="input-message" placeholder="{{__('messages.answer')}}"></textarea>
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label for="disred-uni" class="popup__label-style">{{__('messages.desire_university')}}</label>
            <textarea id="disred-uni" name="university" rows="6" cols="40" class="input-message" placeholder="{{__('messages.answer')}}"></textarea>
        </div>
        <div class="input u-margin-bottom-xsmall u-margin-right-large">
            <label for="interview-location" class="popup__label-style">{{__('messages.interview_location')}}</label>
            <input type="text" id="interview-location" name="interview_location" class="popup__input-style" placeholder="Interview location..." />
        </div>
        <div class="upload-file">
            <div class="upload-file__title-box">
                <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="upload-file-icon my-upload" />
                <h3 class="upload-file__title">
                    {{__('messages.background_pic')}}
                    <input type="file" onchange="showPreview(event);" name="user_picture">
                </h3>
            </div>
        </div>
        <div class="upload-file">
            <div class="upload-file__title-box">
                <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="upload-file-icon my-upload" />
                <h3 class="upload-file__title">
                    {{__('messages.passport_picture')}}
                    <input type="file" onchange="showPreview(event);" name="passport_picture">
                </h3>
            </div>
        </div>
        <div class="upload-file">
            <div class="upload-file__title-box">
                <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="upload-file-icon my-upload" />
                <h3 class="upload-file__title">
                    {{__('messages.recomendation')}}


                    <input type="file" onchange="showPreview(event);" name="letter_picture">

                </h3>
            </div>
        </div>
        <div class="upload-file">
            <div class="upload-file__title-box">
                <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="upload-file-icon my-upload" />
                <h3 class="upload-file__title">
                    {{__('messages.high_school')}}
                    <input type="file" onchange="showPreview(event);" name="high_school_picture">
                </h3>
            </div>
        </div>
        <div class="upload-file">
            <div class="upload-file__title-box">
                <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="upload-file-icon my-upload" />
                <h3 class="upload-file__title">
                    {{__('messages.university')}}
                    <input type="file" onchange="showPreview(event);" name="university_picture">
                </h3>
            </div>
        </div>
        <div class="upload-file">
            <div class="upload-file__title-box">
                <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="upload-file-icon my-upload" />
                <h3 class="upload-file__title">
                    {{__('messages.bechelor_degree')}}
                    <input type="file" onchange="showPreview(event);" name="language_picture">

                </h3>
            </div>
        </div>

        <input type="submit" class="continue" style="width: auto;" value="{{__('messages.continue')}}">
    </form>
</div>
@endsection

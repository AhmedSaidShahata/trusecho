@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}
<div class="search-section">

    <h1 class="search-section__header">

        @if(session()->has('success_ar') OR session()->has('success_en') )
        <div class="alert alert-success">
            {{ $lang == 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

        </div>
        @endif

        {{__('messages.organizations')}}

    </h1>
    <div class="search-section__info">
        <form action="{{ route('user.search_orgs')}}" class="landing-section__info-selections">
            <div class="selection-div u-margin-right-medium">
                <label for="speicialization" class="landing-section__info-selections-label">{{__('messages.types')}}</label>
                <div class="custom-select">
                    <select name="type_id" id="speicialization">
                        <option disabled selected value="">{{__('messages.types')}}</option>
                        @foreach($types as $type)
                        <option <?php if (isset($_GET['type_id']) and $type->id == $_GET['type_id']) echo 'selected' ?> value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="search-section__illustration-box">
                <img src="{{asset('img/jobs-illustration.svg')}}" alt="jobs" class="search-section__illustrations">
            </div>

            <div class="landing-section__info-buttons-section ">
                <button class="landing-section__info-buttons" type="submit">
                    <img src="{{asset('img/Search icon.svg')}}" alt="Search icon" class="search-icon">
                    <p>{{__('messages.search')}}</p>
                </button>

                <a href="{{route('user.organizations.index')}}" class="landing-section__info-buttons">{{__('messages.reset')}}</a>
            </div>
        </form>
    </div>

</div>
<div class="search-results">
    <a href="#apply-for-job" class="my-btn">
        <i class="fas fa-plus"></i>
        {{__('messages.add_org')}}
    </a>
    <div class="search-results__content-box">
        @forelse($organizations as $organization)
       <div hidden>
        {{!$follower = App\Followersorg::where('user_id', '=', Auth::user()->id)->where('org_id', '=', $organization->id)->get()}}
        {{!$followerCount = App\Followersorg::where('org_id', '=', $organization->id)->get()->count()}}</div>
        <div class="organizations-card u-margin-top-small">
            <div class="colored-container"></div>
            <div class="logo-box" style="overflow: hidden;">
                <img src="{{asset('storage/'.$organization->picture_org) }}" alt="Logo" class="best-jobs-section__logo">
            </div>
            <h1 class="best-organizations-section-signed__sub-header"> <a href="{{route('user.organizations.show',$organization->id)}}">{{$organization->name}}</a></h1>

            @auth <p class="best-organizations-section-signed__followers"><span class="follow-count" style="color: green;">{{$followerCount}}</span> {{__('messages.followers')}}</p>
            <a data-orgid="{{$organization->id}}" type="button" class="best-organizations-section-signed__btn-follow add-follower" style="cursor:pointer">@if($follower->count()>0) {{__('messages.following')}} @else {{__('messages.follow')}} @endif</a>
            @endauth
        </div>


        @empty
        <div class="alert alert-primary d-flex align-items-center" role="alert" style="transform: scale(4);height:600px;justify-content: center;align-items: center;display: flex;">
            {{__('messages.no_org')}}
        </div>

        @endforelse


    </div>
    {{$organizations->links()}}



    <div class="popup" id="apply-for-job" style="overflow: auto;">
        <div>
            <form action="{{route('user.organizations.store')}}" method="post" enctype="multipart/form-data">

                <div class="popup__content" style="padding-top: 380px;">
                    <div class="popup__left">
                        <h1 class="popup__header">{{__('messages.add_org')}}</h1>
                        <div class="header__underline"></div>

                        @csrf

                        <input required  type="hidden" name="lang" value="{{$lang}}">

                        <input required  type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <!-- class="add-cv-input" -->
                        <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture')}}</h3>
                        <div class="add-cv">
                            <div class="add-cv__title-box">
                                <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="add-cv-icon" />
                                <input required type="file" name="picture_org" accept="image/*" onchange="showPreview(event);" />
                            </div>
                        </div>

                        <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture_org')}}</h3>
                        <div class="add-cv">
                            <div class="add-cv__title-box">
                                <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="add-cv-icon" />
                                <input required type="file" name="picture_cover" accept="image/*" onchange="showPreview(event);" />
                            </div>
                        </div>
                        <!-- <div class="add-cv">

                    <div class="add-cv__title-box">
                        <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="add-cv-icon" />

                    </div>
                </div> -->

                        <div class="applying-for-job-illustration-box">
                            <img src="{{asset('img/applying-for-a-job.svg')}}" alt="apply for job" class="applying-for-job-illustration" />
                        </div>
                    </div>
                    <div class="popup__right" style="position: relative;">
                        <a href="#tours_section" class="popup__closing">×</a>

                        <div class="input">
                            <label class="popup__label-style">{{__('messages.org_name')}}</label>
                            <input required required type="text" name="name" class="popup__input-style" />
                        </div>
                        <div class="input">
                            <label class="popup__label-style">{{__('messages.org_type')}}</label>
                            <input required required type="text" name="type" class="popup__input-style" />
                        </div>

                        <div class="input">
                            <label class="popup__label-style">{{__('messages.country')}}</label>
                            <input required required type="text" name="country" class="popup__input-style" />
                        </div>

                        <div class="input">
                            <label class="popup__label-style">{{__('messages.location')}}</label>
                            <input required required type="text" name="location" class="popup__input-style" />
                        </div>

                        <div class="input">
                            <label class="popup__label-style">{{__('messages.about')}}</label>
                            <input required required type="text" name="about" class="popup__input-style" />
                        </div>
                        <div class="input">
                            <label class="popup__label-style">{{__('messages.website')}}</label>
                            <input required required type="text" name="website" class="popup__input-style" />
                        </div>
                        <div class="input">
                            <label class="popup__label-style">{{__('messages.whatsapp_num')}}</label>
                            <input required required type="text" name="whatsapp" class="popup__input-style" />
                        </div>

                        <div class="input">
                            <label class="popup__label-style">{{__('messages.email')}}</label>
                            <input required required type="email" name="email" class="popup__input-style" />
                        </div>

                        <div class="input">
                            <label for="message" class="popup__label-style">{{__('messages.description')}}</label>
                            <textarea id="message" name="description" rows="3" cols="60" class="input-message" ></textarea>
                        </div>

                        <input required required class="input-btn" type="submit" value="{{__('messages.submit')}}">

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang='_'.LaravelLocalization::getCurrentLocale()}}
<div class="organization-cover-pic-box">
    <img src="{{asset('storage/'.$organization->picture_cover)}}" alt="org cover pic" class="organization-cover-pic" style="height:376px; width:100%" />
    <div class="organization-profile-info-box">
        <div class="organization-profile-pic-box" style="overflow: hidden;">
            <img src="{{asset('storage/'.$organization->picture_org)}}" alt="Company Logo" class="organization-profile-pic" style="height:200px;width:200px" />
        </div>
        <div class="organization-info">
            <h1 class="organization-name">{{$organization->name }}</h1>
            <div class="followers-box">
                <p class="followers-title">{{__('messages.followers')}}:</p>
                <div hidden> {{!$follower = App\Followersorg::where('user_id', '=', Auth::user()->id)->where('org_id', '=', $organization->id)->get()}}
                    {{!$followerCount = App\Followersorg::where('org_id', '=', $organization->id)->get()->count()}}

                </div>
                <p class="followers-value">{{$followerCount}}</p>
            </div>
        </div>
    </div>
</div>
<div class="org-job-section-info" style="margin-bottom: 26px;">
    <div class="left-panel">
        <div class="org-job-section-info__options">
            <ul class="options__list">
                <li class="options__items">
                    <a href="#" class="options__item">{{__('messages.about')}}</a>
                </li>
                <hr />
                <li class="options__items">
                    <a href="{{route('user.newsorgs.show',$organization->id)}}" class="options__item">{{__('messages.news')}}</a>
                </li>
            </ul>
        </div>
        <div class="org-job-section-info__options u-margin-top-small">
            <ul class="options__list">
                <li class="options__items">
                    <a href="#" class="options__item">{{__('messages.contact_us')}}</a>
                </li>
                <hr />
                <li class="options__items">
                    <a href="#" class="options__item">{{__('messages.call_us')}}</a>
                </li>
                <li class="options__items">
                    <a href="#" class="options__item">{{__('messages.report')}}</a>
                </li>
            </ul>
        </div>
        <a href="#" class="orgs-job-whatsapp-btn">
            <img src="{{asset('img/Icon awesome-whatsapp.svg')}}" alt="Whatsapp" class="contact-icon">
            {{__('messages.contact_whats')}}

        </a>
        <a href="#" class="orgs-job-email-btn">
            <img src="{{asset('img/Icon material-email.svg')}}" alt="email" class="contact-icon">
            {{__('messages.contact_email')}}


        </a>
    </div>
    <div class="right-panel">
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.country')}}:</p>
            </div>
            <p class="right-panel__subtitle-value"> {{$organization->country }}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.followers')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$followerCount}}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.website')}}:</p>
            </div>
            <p class="right-panel__subtitle-value"><a href="{{$organization->website}}">{{$organization->website}}</a></p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.email')}}:</p>
            </div>
            <p class="right-panel__subtitle-value"> {{$organization->email}}</p>
        </div>
        <p class="right-panel__subtitle u-margin-top-small">{{__('messages.description')}}:</p>
        <p class="right-panel__description">
            {{$organization->description }}

        </p>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle u-width-fix">{{__('messages.rate_org')}}:</p>
                <span hidden class="org-id">{{$organization->id}}</span>
            </div>
            <div class="right-panel__subtitle-value">
                <div hidden>
                    {{!$count_rate_of_org=App\Rateorg::where('org_id', '=', $organization->id)->get()->count()}}
                </div>
                @if($count_rate_of_org ==0)

                @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far rate-org fa-star fa-2x "></i>

                    @endfor

                    @else

                    {{!$sum_values_rate = App\Rateorg::where('org_id', '=', $organization->id)->get()->avg('value_rate')}}

                    {{!$decimal_total_rate = substr($sum_values_rate, 0, 3)}}

                    {{!$integer_total_rate = substr($sum_values_rate, 0, 1)}}

                    <div hidden>
                        {{!$is_desimal = $decimal_total_rate - $integer_total_rate}}
                    </div>

                    @for ($i = 1; $i <= $integer_total_rate; $i++) <i data-value="{{$i}}" class="fas rate-org fa-star fa-2x"></i>

                        @endfor

                        @if ($is_desimal >= .3 && $is_desimal <= 8) <i data-value="{{$i}}" class="fas rate-org fa-star-half-alt fa-2x"></i>

                            @for ($i = $integer_total_rate + 2; $i <= 5; $i++) <i data-value="{{$i}}" class="far rate-org fa-star fa-2x"></i>
                                @endfor

                                @else

                                @for ($i = $integer_total_rate + 1; $i <= 5; $i++) <i data-value={{$i}} class="far rate-org fa-star fa-2x"></i>

                                    @endfor


                                    @endif

                                    <div class="rate_div"> total rated is <span class="rate_numbers"> {{ $decimal_total_rate }}</span> from <span class="rate_numbers"> {{$count_rate_of_org }}</span> Users </div>


                                    @endif
            </div>
        </div>
    </div>
</div>


@endsection

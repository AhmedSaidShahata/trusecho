@extends('user.layouts.fixed_layout')
@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}
@guest
<div class="landing-section">
    <div class="landing-section__info">
        <h1 class="landing-section__info-header">
            {{__('messages.search-opportunities')}}
        </h1>
        <form action="#" class="landing-section__info-selections">
            <div class="selection-div">
                <label for="cars" class="landing-section__info-selections-label"> {{__('messages.cost')}}</label>
                <div class="custom-select">
                    <select name="cost" id="cost">
                        <option value="Fully Funded">{{(__('messages.fully_fun'))}}</option>
                        <option value="Partialy Funded">{{(__('messages.part_fun'))}}</option>
                    </select>
                </div>
            </div>
            <div class="selection-div">
                <label for="type" class="landing-section__info-selections-label"> {{__('messages.type')}}</label>
                <div class="custom-select">
                    <select name="type" id="type" class="select-for-label">
                        <option value="Fully Funded">{{(__('messages.fully_fun'))}}</option>
                        <option value="Partialy Funded">{{(__('messages.part_fun'))}}</option>
                    </select>
                </div>
            </div>
            <div class="selection-div">
                <label for="speicialization" class="landing-section__info-selections-label"> {{__('messages.specialization')}}</label>
                <div class="custom-select">
                    <select name="speicialization" id="speicialization">
                        <option value="Fully Funded">{{(__('messages.fully_fun'))}}</option>
                        <option value="Partialy Funded">{{(__('messages.part_fun'))}}</option>
                    </select>
                </div>
            </div>
            <div class="selection-div">
                <label for="language" class="landing-section__info-selections-label"> {{__('messages.language')}}</label>
                <div class="custom-select">
                    <select name="language" id="language">
                        <option value="Fully Funded">{{(__('messages.fully_fun'))}}</option>
                        <option value="Partialy Funded">{{(__('messages.part_fun'))}}</option>
                    </select>
                </div>
            </div>
        </form>
        <!-- <div class="landing-section__info-examples">
            <div class="landing-section__info-examples-option">
                <p class="text-sample">Faisl Uni</p>
                <img src="{{asset('img/X.svg')}}" alt="X" class="close-symbol">
            </div>
            <div class="landing-section__info-examples-option">
                <p class="text-sample">Faisl Uni</p>
                <img src="{{asset('img/X.svg')}}" alt="X" class="close-symbol">
            </div>
            <div class="landing-section__info-examples-option">
                <p class="text-sample">Faisl Uni</p>
                <img src="{{asset('img/X.svg')}}" alt="X" class="close-symbol">
            </div>
            <div class="landing-section__info-examples-option">
                <p class="text-sample">Faisl Uni</p>
                <img src="{{asset('img/X.svg')}}" alt="X" class="close-symbol">
            </div>
        </div> -->
        <div class="landing-section__info-buttons-section">
            <a class="landing-section__info-buttons" href="{{ route('login') }}">
                <img src="{{asset('img/Search icon.svg')}}" alt="Search icon" class="search-icon">
                <p> {{__('messages.search')}}</p>
            </a>
            <a class="landing-section__info-buttons" href="{{ route('login') }}"> {{__('messages.reset')}}</a>
        </div>
    </div>
</div>
<div class="world-wide-section">
    <div class="world-wide-section_info">
        <h1 class="world-wide-section_info-header" data-aos="fade-right" data-aos-delay="300"> {{__('messages.world_opport')}}</h1>
        <p class="world-wide-section_info-text" data-aos="fade-right" data-aos-delay="300"> {{__('messages.lorem1')}}</p>
    </div>
    <div class="world-wide-section_info-illustration-box" data-aos="fade-left" data-aos-delay="300">
        <img src="{{asset('img/World Wide Opportunity.svg')}}" alt="Image" class="world-wide-section_info-illustration">
    </div>
</div>
<div class="options-section">
    <div class="options-section__cards-info">
        <div class="options-section__card" data-aos="fade-up" data-aos-delay="300">
            <div class="options-section__card-icon-box">
                <img src="{{asset('img/talent-icon.svg')}}" alt="Talent Icon" class="options-section__card-icon">
            </div>
            <h1 class="options-section__header">{{__('messages.find_best_opport')}}</h1>
            <p class="options-section__paragraph">{{__('messages.find_best_opport_text')}}</p>
        </div>
        <div class="options-section__card" data-aos="fade-up" data-aos-delay="350">
            <div class="options-section__card-icon-box">
                <img src="{{asset('img/career-icon.svg')}}" alt="Talent Icon" class="options-section__card-icon">
            </div>
            <h1 class="options-section__header">{{__('messages.future')}}</h1>
            <p class="options-section__paragraph">{{__('messages.future_text')}}</p>
        </div>
        <div class="options-section__card" data-aos="fade-up" data-aos-delay="400">
            <div class="options-section__card-icon-box">
                <img src="{{asset('img/services-icon.svg')}}" alt="Services icon" class="options-section__card-icon">
            </div>
            <h1 class="options-section__header">{{__('messages.service_find')}}</h1>
            <p class="options-section__paragraph">{{__('messages.service_find_text')}}</p>
        </div>
        <div class="options-section__card" data-aos="fade-up" data-aos-delay="450">
            <div class="options-section__card-icon-box">
                <img src="{{asset('img/organization-icon.svg')}}" alt="Organization Icon" class="options-section__card-icon">
            </div>
            <h1 class="options-section__header">{{__('messages.top_org')}}</h1>
            <p class="options-section__paragraph">{{__('messages.top_org_text')}}</p>
        </div>
    </div>

</div>

@endguest
<div class="best-scolarships-section-signed">
    @if(session()->has('success_ar') OR session()->has('success_en') )
    <div class="alert alert-success" style="margin-top: 100px;">
        {{ $lang == 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}
    </div>
    @endif
    <h1 class="best-scolarships-section-signed__header">{{__('messages.best_scholarships')}}</h1>
    <div class="best-scolarships-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @forelse($scholarships as $scholarship)

                {{!$best_scholar= App\Scholarship::find($scholarship->scholarship_id)}}

                <div class="best-scolarships-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">{{ $best_scholar->cost->name }}</span>
                        <img src="{{asset('storage/'.$best_scholar->picture)}}" alt="Picutre 1" class="card-picture my-image">
                    </div>
                    <h1 class="best-scolarships-section-signed__card-header">{{ $best_scholar->title}}</h1>
                    <p class="best-scolarships-section-signed__card-paragraph">

                    {{ substr($best_scholar->description,0,30) }}
                </p>
                    <div class="best-scolarships-section-signed__card-deadline-box">
                        <img src="{{asset('img/Icon ionic-ios-timer.svg')}}" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">{{__('messages.hours')}}:{{__('messages.days')}}:{{__('messages.months')}}</h2>
                            <div hidden> {{!$created=$best_scholar->created_at->format('Y-m-d')}}
                                {{!$deadline=$best_scholar->deadline}}
                                {{!$start_date = \Carbon\Carbon::createFromFormat('Y-m-d',$created)}}
                                {{!$end_date = \Carbon\Carbon::createFromFormat('Y-m-d',$deadline)}}
                                {{!$different_days = $start_date->diffInDays($end_date)}}
                                {{!$different_hours = $start_date->diffInHours($end_date)}}
                                {{!$different_months = $start_date->diffInMonths($end_date)}}
                            </div>

                            <h3 class="deadline-value">{{ $different_hours}}:{{ $different_days}}:{{ $different_months}}</h3>


                        </div>
                        <a href="{{route('user.scholarships.show',$best_scholar->id)}}" class="details-button">{{__('messages.details')}}</a>
                    </div>
                </div>
                @empty
                <div class="alert alert-primary" role="alert" style="transform: scale(4);">
                    {{__('messages.no_scholar')}}
                </div>
                @endforelse


            </div>
        </div>
    </div>
    <a href="{{route('user.scholarships.index')}}" class="btn-view-more">{{__('messages.more')}}</a>
</div>
<div class="best-jobs-section-signed">
    <h1 class="best-jobs-section-signed__header">{{__('messages.best_jobs')}}</h1>
    <div class="best-jobs-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @forelse($jobs as $job)
                {{!$best_job= App\Job::find($job->job_id)}}
                <div class="best-jobs-section-signed__card swiper-slide" style="overflow: hidden;">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">
                            {{$best_job->title}}
                        </span>
                        <img src="/storage/{{$best_job->picture}}" alt="Picutre 1" class="card-picture my-image">
                    </div>
                    <h1 class="best-jobs-section-signed__card-header"> {{__('messages.salary')}} {{$best_job->salary}} $</h1>
                    <p class="best-jobs-section-signed__card-paragraph">

                    {{ substr($best_job->description,0,30) }}

                    </p>
                    <div class="best-jobs-section-signed__card-deadline-box">
                        <img src="{{asset('img/Icon ionic-ios-timer.svg')}}" alt="deadline" class="best-jobs-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">{{__('messages.hours')}}:{{__('messages.days')}}:{{__('messages.months')}}</h2>
                            <div hidden> {{!$created=$best_job->created_at->format('Y-m-d')}}
                                {{!$deadline=$best_job->deadline}}
                                {{!$start_date = \Carbon\Carbon::createFromFormat('Y-m-d',$created)}}
                                {{!$end_date = \Carbon\Carbon::createFromFormat('Y-m-d',$deadline)}}
                                {{!$different_days = $start_date->diffInDays($end_date)}}
                                {{!$different_hours = $start_date->diffInHours($end_date)}}
                                {{!$different_months = $start_date->diffInMonths($end_date)}}
                            </div>

                            <h3 class="deadline-value">{{ $different_hours}}:{{ $different_days}}:{{ $different_months}}</h3>
                        </div>
                        <a href="{{route('user.jobs.show',$best_job->id)}}" class="details-button">{{__('messages.details')}}</a href="#">
                    </div>
                </div>
                @empty
                <div class="alert alert-primary" role="alert" style="transform: scale(4);">
                    {{__('messages.no_jobs')}}
                </div>
                @endforelse


            </div>
        </div>
    </div>
    <a href="{{route('user.jobs.index')}}" class="btn-view-more">{{__('messages.more')}}</a>
</div>
<div class="best-services-section-signed">
    <h1 class="best-services-section-signed__header">{{__('messages.best_services')}}</h1>
    <div class="best-services-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @forelse($services as $service)
                {{!$best_service= App\Service::find($service->service_id)}}
                <div class="best-services-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">{{$best_service->type->name}}</span>
                        <img src="/storage/{{$best_service->picture}}" alt="Picutre 1" class="card-picture my-image">
                    </div>
                    <h1 class="best-services-section-signed__card-header">{{$best_service->title}}</h1>
                    <p class="best-services-section-signed__card-paragraph">
                        {{ substr($best_service->description,0,30) }}
                    </p>
                    <div class="best-services-section-signed__card-rating-box" style="padding-left: 25px;">

                        <div hidden> {{!$count_rate_of_ser=App\Rateser::where('ser_id', '=', $best_service->id)->get()->count()}}</div> @if($count_rate_of_ser==0) @for($i=1; $i<=5; $i++) <i class="far fa-star fa-2x"></i>

                            @endfor

                            @else

                            {{!$sum_values_rate = App\Rateser::where('ser_id', '=', $best_service->id)->get()->avg('value_rate')}}

                            {{!$decimal_total_rate = substr($sum_values_rate, 0, 3)}}

                            {{!$integer_total_rate = substr($sum_values_rate, 0, 1)}}

                            <div hidden>
                                {{!$is_desimal = $decimal_total_rate - $integer_total_rate }}
                            </div>

                            @for ($i = 1; $i <= $integer_total_rate ; $i++) <i class="fas fa-star fa-2x"></i>

                                @endfor

                                @if ($is_desimal >= .3 && $is_desimal <= .8) <i class="fas fa-star-half-alt fa-2x"></i>

                                    @for ($i = $integer_total_rate + 2; $i <= 5; $i++) <i class="far fa-star fa-2x"></i>
                                        @endfor

                                        @else

                                        @for ($i = $integer_total_rate + 1; $i <= 5; $i++) <i data-value={{$i}} class="far fa-star fa-2x"></i>

                                            @endfor


                                            @endif




                                            @endif


                                            <span class="rating-number">{{$sum_values_rate ?? 0  }}</span>
                                            <a href="{{route('user.services.show',$best_service->id)}}" class="details-button">{{__('messages.details')}}</a href="#">
                    </div>
                </div>
                @empty
                <div class="alert alert-primary" role="alert" style="transform: scale(1);font-size: 35px;">
                    {{__('messages.no_services')}}
                </div>

                @endforelse


            </div>
        </div>
    </div>
    <a href="{{route('user.services.index')}}" class="btn-view-more">{{__('messages.more')}}</a>
</div>
<div class="best-organizations-section-signed">
    <h1 class="best-organizations-section-signed__header">{{__('messages.organizations')}}</h1>
    <div class="best-organizations-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @forelse($organizations as $organization)
                {{!$best_organization= App\Organization::find($organization->organization_id)}}
                @auth
                <div hidden> {{!$follower = App\Followersorg::where('user_id', '=', Auth::user()->id)->where('org_id', '=', $best_organization->id)->get()}}
                    {{!$followerCount = App\Followersorg::where('org_id', '=', $best_organization->id)->get()->count()}}

                </div>
                @endauth
                <div class="best-organizations-section-signed__card swiper-slide">
                    <div class="colored-container"></div>
                    <div class="logo-box" style="overflow: hidden;">
                        <img src="{{asset('storage/'.$best_organization->picture_org) }}" alt="Logo" class="best-jobs-section__logo">
                    </div>
                    <h1 class="best-organizations-section-signed__sub-header"> <a href="{{route('user.organizations.show',$best_organization->id)}}">{{$best_organization->name}}</a></h1>
                    @auth <p class="best-organizations-section-signed__followers"><span class="follow-count" style="color: green;">{{$followerCount}}</span> {{__('messages.followers')}}</p>
                    <a data-orgid="{{$best_organization->id}}" type="button" class="best-organizations-section-signed__btn-follow add-follower" style="cursor:pointer">@if($follower->count()>0) {{__('messages.following')}} @else {{__('messages.follow')}} @endif</a>@endauth
                </div>
                @empty
                <div class="alert alert-primary" role="alert" style="transform: scale(4);">
                    {{__('messages.no_org')}}
                </div>

                @endforelse


            </div>
        </div>
    </div>
    <a href="{{route('user.organizations.index')}}" class="btn-view-more">{{__('messages.more')}}</a>
</div>
<div class="blog-section">
    <h1 class="blog-section__header">{{__('messages.blogs')}}</h1>
    <div class="blog-section__cards-info">



        @forelse($categories as $category)
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="{{asset('storage/'.$category->picture)}}" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">{{$category->name}}</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">{{__('messages.comments')}}:</p>
                    <p class="blog-card-content__subtitle-value">0</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">{{__('messages.participants')}}:</p>
                    <p class="blog-card-content__subtitle-value">1</p>
                </div>
            </div>

            <a href="{{route('user.categoryblogs.show',$category->id)}}" class="blog-section__btn">{{__('messages.visit')}}</a>
        </div>
        @empty
        <div class="alert alert-primary" role="alert" style="transform: scale(4);">
            {{__('messages.no_blogs')}}
        </div>
        @endforelse

    </div>
    <a href="{{route('user.categoryblogs.index')}}" class="btn-view-more">{{__('messages.more')}}</a>
</div>



@guest()

<div class="subscriptions-section">
    <h1 class="subscriptions-section__header">{{__('messages.subscribe_website')}}</h1>
    <div class="subscriptions-section__content-box">
        <div class="subscriptions-card" data-aos="fade-up" data-aos-delay="250">
            <h1 class="subscriptions-card__header">{{__('messages.monthly_subscription')}}</h1>
            <p class="subscriptions-card__description" style="padding-bottom:100px!important">{{__('messages.lorem1')}}</p>
            <a href="#" class="subscriptions-card__button">{{__('messages.sing_up_now')}}</a>
        </div>
        <div class="subscriptions-card" data-aos="fade-up" data-aos-delay="300">
            <h1 class="subscriptions-card__header">{{__('messages.monthly_subscription')}}</h1>
            <p class="subscriptions-card__description">{{__('messages.lorem1')}}</p>
            <a href="#" class="subscriptions-card__button grn-color">{{__('messages.sing_up_now')}}</a>
        </div>
        <div class="subscriptions-card__illustration-box" data-aos="fade-left" data-aos-delay="200">
            <img src="{{asset('img/Subscription Illustration.svg')}}" alt="Subscription" class="subscriptions-card__illusrations">
        </div>
    </div>

</div>
<div class="sign-up-section">
    <h1 class="sign-up-section__header">{{__('messages.ready_sign')}} </h1>
    <div class="sign-up-section__content-box">
        <div class="sign-up-as-a-person" data-aos="fade-up" data-aos-delay="300">
            <div class="sign-up-as-a-person__illustartion-box">
                <img src="{{asset('img/sign-up-as-a-person.svg')}}" alt="Sign up as a person" class="sign-up-as-a-person__illustration">
            </div>
            <a href="#" class="sign-up-as-a-person__button">{{__('messages.sign_person')}} </a>
        </div>
        <div class="sign-up-as-an-org" data-aos="fade-up" data-aos-delay="350">
            <div class="sign-up-as-an-org-box">
                <img src="{{asset('img/sign-up-as-an-org.svg')}}" alt="Sign up as an organization" class="sign-up-as-an-org__illustration">
            </div>
            <a href="#" class="sign-up-as-an-org__button">{{__('messages.org')}} </a>
        </div>
    </div>
</div>
<div class="stats-section">
    <div class="stats-section__card">
        <div class="stats-section__card-icon-box">
            <img src="{{asset('img/jobs-icon.svg')}}" alt="jobs" class="stats-section__jobs-icon">
        </div>
        <h1 class="stats-section__card-header">{{__('messages.jobs')}} </h1>
        <h1 class="stats-section__card-number" id="jobsNumber">+{{$count_organizations}}</h1>
    </div>
    <div class="stats-section__card">
        <div class="stats-section__card-icon-box">
            <img src="{{asset('img/opportunity-icon.svg')}}" alt="jobs" class="stats-section__jobs-icon">
        </div>
        <h1 class="stats-section__card-header">{{__('messages.opportunities')}} </h1>
        <h1 class="stats-section__card-number">+{{$count_opportunities}}</h1>
    </div>
    <div class="stats-section__card">
        <div class="stats-section__card-icon-box">
            <img src="{{asset('img/org-icon.svg')}}" alt="jobs" class="stats-section__jobs-icon">
        </div>
        <h1 class="stats-section__card-header">{{__('messages.organizations')}}</h1>
        <h1 class="stats-section__card-number">+{{$count_organizations}}</h1>
    </div>
</div>

<!-------------------------------------------- Start Testimonials----------------------------------->
<div class="testmonials-section">
    <h1 class="testmonials-section__header">{{__('messages.testimonials')}}</h1>
    <div class="testmonials-section__content-box">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @forelse($testimonials as $testimonial)

                <div class="testmonials-section__card swiper-slide">
                    <div class="testmonials-section__card-profile-pic-box">
                        <img src="{{asset('storage/'.$testimonial->picture)}}" alt="testmonials-pic-1" class="testmonials-section__card-profile-pic" style="width:55px; height:55px; border-radius:50%;">
                    </div>
                    <h1 class="testmonials-section__card-name"> {{$testimonial->name}}</h1>
                    <p class="testmonials-section__card-description">
                        {{$testimonial->description}}
                    </p>
                    <div class="testmonials-section__card-rating-box">

                        {{!$decimal_total_rate_testimonial = substr($testimonial->rate, 0, 3)}}

                        {{!$integer_total_rate_testimonial = substr($testimonial->rate, 0, 1)}}

                        <div hidden>
                            {{!$is_desimal_testimonial = $decimal_total_rate_testimonial - $integer_total_rate_testimonial }}
                        </div>

                        @for ($i = 1; $i <= $integer_total_rate_testimonial ; $i++) <i class="fas fa-star fa-2x"></i>

                            @endfor

                            @if ($is_desimal_testimonial >= .3 && $is_desimal_testimonial <= .8) <i class="fas fa-star-half-alt fa-2x"></i>

                                @for ($i = $integer_total_rate_testimonial + 2; $i <= 5; $i++) <i class="far fa-star fa-2x"></i>
                                    @endfor


                                    @else

                                    @for ($i = $integer_total_rate_testimonial + 1; $i <= 5; $i++) <i data-value={{$i}} class="far fa-star fa-2x"></i>

                                        @endfor


                                        @endif

                                        <span class="testmonials-section__card-rating-number">{{$testimonial->rate}}</span>
                    </div>
                </div>
                @empty

                <div class="alert alert-primary" role="alert" style="font-size:20px">
                    {{__('messages.no_testimonials')}}
                </div>

                @endforelse
            </div>
        </div>
    </div>
    <a href="{{route('user.testimonials.index')}}" class="btn-read-more">{{__('messages.more')}}</a>
</div>

<!-------------------------------------------- Start Our Partners----------------------------------->

<div class="partners-section">
    <h1 class="partners-section__header">{{__('messages.our_partiners')}} </h1>
    <div class="partners-section__content-box">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="partners-section__content-box-org-container swiper-slide">
                    <img src="{{asset('img/Quechua_company_logo.png')}}" alt="Logo company" class="partners-section__content-box-org-logo">
                </div>
                <div class="partners-section__content-box-org-container swiper-slide">
                    <img src="{{asset('img/ksu_masterlogo_colour_rgb.png')}}" alt="Logo company" class="partners-section__content-box-org-logo">
                </div>
                <div class="partners-section__content-box-org-container swiper-slide">
                    <img src="{{asset('img/Thiqa.png')}}" alt="Logo company" class="partners-section__content-box-org-logo">
                </div>
            </div>
        </div>

    </div>
</div>
<div class="social-media-section">
    <h1 class="social-media-section__header">{{__('messages.social_media')}} </h1>
    <div class="social-media-section__content-box">
        <div class="social-media__card">
            <div class="social-media__card-logo-box">
                <img src="{{asset('img/facebook.png')}}" alt="facebook" class="social-media__card-logo">
            </div>
            <span class="social-media__card-number">+1,001,564</span>
        </div>
        <div class="social-media__card">
            <div class="social-media__card-logo-box">
                <img src="{{asset('img/twitter.png')}}" alt="facebook" class="social-media__card-logo">
            </div>
            <span class="social-media__card-number">+1,056,46</span>
        </div>
        <div class="social-media__card">
            <div class="social-media__card-logo-box">
                <img src="{{asset('img/instagram.png')}}" alt="facebook" class="social-media__card-logo">
            </div>
            <span class="social-media__card-number">+25,023</span>
        </div>
        <div class="social-media__card">
            <div class="social-media__card-logo-box">
                <img src="{{asset('img/telegram.png')}}" alt="facebook" class="social-media__card-logo">
            </div>
            <span class="social-media__card-number">+36,578</span>
        </div>
        <div class="social-media__card">
            <div class="social-media__card-logo-box">
                <img src="{{asset('img/linkedin.png')}}" alt="facebook" class="social-media__card-logo">
            </div>
            <span class="social-media__card-number">+12,354</span>
        </div>
    </div>

</div>
<div class="newsletter-section">
    <h1 class="newsletter-section__header" data-aos="fade-up" data-aos-delay="250">{{__('messages.subscribe_news')}}</h1>
    <div class="newsletter-section__content-box">
        <div class="newsletter-section__illustration-box" data-aos="fade-up" data-aos-delay="300">
            <img src="{{asset('img/newsletter-illustration.svg')}}" alt="newsletter" class="newsletter-section__illustration">
        </div>
        <div class="subscription-input" data-aos="fade-up" data-aos-delay="350">
            <p class="subscription-input__paragraph">{{__('messages.subscribe_text')}}</p>
            <div class="input-style">
                <input type="email" name="email" id="email" class="subscription-input__email" placeholder="email@email.com">
                <button class="subscription-input__email-button">{{__('messages.subscribe')}}</button>
            </div>
        </div>
    </div>
</div>

@endguest
@endsection

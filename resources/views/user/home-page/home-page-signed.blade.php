@extends('user.layouts.fixed_layout')
@section('content')
<div class="best-scolarships-section-signed">
    <h1 class="best-scolarships-section-signed__header">Best scholarships</h1>
    <div class="best-scolarships-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @forelse($scholarships as $scholarship)

                {{!$best_scholar= App\Scholarship::find($scholarship->scholarship_id)}}

                <div class="best-scolarships-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">{{$best_scholar->cost->name_en}}</span>
                        <img src="{{asset('storage/'.$best_scholar->picture)}}" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-scolarships-section-signed__card-header">{{$best_scholar->title_en}}</h1>
                    <p class="best-scolarships-section-signed__card-paragraph">{{$best_scholar->description_en}}</p>
                    <div class="best-scolarships-section-signed__card-deadline-box">
                        <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">Hours:Days:Months</h2>
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
                        <a href="{{route('user.scholarships.show',$best_scholar->id)}}" class="details-button">Details</a>
                    </div>
                </div>
                @empty
                <div class="alert alert-primary" role="alert" style="transform: scale(4);">
                    No Scholarships Yet
                </div>
                @endforelse


            </div>
        </div>
    </div>
    <a href="{{route('user.scholarships.index')}}" class="btn-view-more">View More</a>
</div>
<div class="best-jobs-section-signed">
    <h1 class="best-jobs-section-signed__header">Best Jobs</h1>
    <div class="best-jobs-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @forelse($jobs as $job)
                {{!$best_job= App\Job::find($job->job_id)}}
                <div class="best-jobs-section-signed__card swiper-slide" style="overflow: hidden;">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">
                            {{!$cost = app\Cost::find($best_job->cost_id)}}
                            {{$cost->name}}
                        </span>
                        <img src="/storage/{{$best_job->picture}}" alt="Picutre 1" class="card-picture" style="height: 162px;">
                    </div>
                    <h1 class="best-jobs-section-signed__card-header">{{$best_job->title_en}}</h1>
                    <p class="best-jobs-section-signed__card-paragraph">{{$best_job->description_en}}</p>
                    <div class="best-jobs-section-signed__card-deadline-box">
                        <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-jobs-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">Hours:Days:Months</h2>
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
                        <a href="{{route('user.jobs.show',$best_job->id)}}" class="details-button">Details</a href="#">
                    </div>
                </div>
                @empty
                <div class="alert alert-primary" role="alert" style="transform: scale(4);">
                    No Jobs Yet
                </div>
                @endforelse


            </div>
        </div>
    </div>
    <a href="{{route('user.jobs.index')}}" class="btn-view-more">View More</a>
</div>
<div class="best-services-section-signed">
    <h1 class="best-services-section-signed__header">Best Services</h1>
    <div class="best-services-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @forelse($services as $service)
                {{!$best_service= App\Service::find($service->service_id)}}
                <div class="best-services-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">Fully funded</span>
                        <img src="/storage/{{$best_service->picture}}" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-services-section-signed__card-header">{{$best_service->title_en}}</h1>
                    <p class="best-services-section-signed__card-paragraph">{{$best_service->description_en}}</p>
                    <div class="best-services-section-signed__card-rating-box" style="padding-left: 25px;">

                        <div hidden> {{!$count_rate_of_ser=App\Rateser::where('ser_id', '=', $best_service->id)->get()->count()}}</div> @if($count_rate_of_ser==0) @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>

                            @endfor

                            @else

                            {{!$sum_values_rate = App\Rateser::where('ser_id', '=', $best_service->id)->get()->avg('value_rate')}}

                            {{!$decimal_total_rate = substr($sum_values_rate, 0, 3)}}

                            {{!$integer_total_rate = substr($sum_values_rate, 0, 1)}}

                            <div hidden>
                                {{!$is_desimal = $decimal_total_rate - $integer_total_rate }}
                            </div>

                            @for ($i = 1; $i <= $integer_total_rate ; $i++) <i data-value="{{$i}}" class="fas fa-star fa-2x"></i>

                                @endfor

                                @if ($is_desimal >= .3 && $is_desimal <= 8) <i data-value="{{$i}}" class="fas fa-star-half-alt fa-2x"></i>

                                    @for ($i = $integer_total_rate + 2; $i <= 5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>
                                        @endfor

                                        @else

                                        @for ($i = $integer_total_rate + 1; $i <= 5; $i++) <i data-value={{$i}} class="far fa-star fa-2x"></i>

                                            @endfor


                                            @endif




                                            @endif


                                            <span class="rating-number">{{$sum_values_rate ?? 0  }}</span>
                                            <a href="{{route('user.services.show',$best_service->id)}}" class="details-button">Details</a href="#">
                    </div>
                </div>
                @empty
                <div class="alert alert-primary" role="alert" style="transform: scale(4);">
                    No services Yet
                </div>

                @endforelse


            </div>
        </div>
    </div>
    <a href="{{route('user.services.index')}}" class="btn-view-more">View More</a>
</div>
<div class="best-organizations-section-signed">
    <h1 class="best-organizations-section-signed__header">Best Organization</h1>
    <div class="best-organizations-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @forelse($organizations as $organization)
                {{!$best_organization= App\Organization::find($organization->organization_id)}}
                {{!$follower = App\Followersorg::where('user_id', '=', Auth::user()->id)->where('org_id', '=', $best_organization->id)->get()}};
                {{!$followerCount = App\Followersorg::where('org_id', '=', $best_organization->id)->get()->count()}};
                <div class="best-organizations-section-signed__card swiper-slide">
                    <div class="colored-container"></div>
                    <div class="logo-box" style="overflow: hidden;">
                        <img src="{{asset('storage/'.$best_organization->picture_org) }}" alt="Logo" class="best-jobs-section__logo">
                    </div>
                    <h1 class="best-organizations-section-signed__sub-header"> <a href="{{route('user.organizations.show',$best_organization->id)}}">{{$best_organization->name_en}}</a></h1>
                    <p class="best-organizations-section-signed__followers"><span class="follow-count" style="color: green;">{{$followerCount}}</span> follower</p>
                    <a data-orgid="{{$best_organization->id}}" type="button" class="best-organizations-section-signed__btn-follow add-follower" style="cursor:pointer">@if($follower->count()>0) following @else follow @endif</a>
                </div>
                @empty
                <div class="alert alert-primary" role="alert" style="transform: scale(4);">
                    No Organizations Yet
                </div>

                @endforelse


            </div>
        </div>
    </div>
    <a href="{{route('user.organizations.index')}}" class="btn-view-more">View More</a>
</div>
<div class="blog-section">
    <h1 class="blog-section__header">Blogs</h1>
    <div class="blog-section__cards-info">



        @forelse($categories as $category)
        <div class="blog-section__card">
            <div class="blog-section__pic-box">
                <img src="{{asset('storage/'.$category->picture)}}" alt="blog pic" class="blog-section__pic">
            </div>
            <div class="blog-card-content">
                <h1 class="blog-card-content__header">{{$category->name_en}}</h1>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Comments:</p>
                    <p class="blog-card-content__subtitle-value">0</p>
                </div>
                <div class="blog-card-content-info">
                    <p class="blog-card-content__subtitle">Participants:</p>
                    <p class="blog-card-content__subtitle-value">1</p>
                </div>
            </div>

            <a href="{{route('user.categoryblogs.show',$category->id)}}" class="blog-section__btn">visit</a>
        </div>
        @empty
        <div class="alert alert-primary" role="alert" style="transform: scale(4);">
            No Blogs Yet
        </div>
        @endforelse

    </div>
    <a href="{{route('user.categoryblogs.index')}}" class="btn-view-more">View More</a>
</div>
@endsection

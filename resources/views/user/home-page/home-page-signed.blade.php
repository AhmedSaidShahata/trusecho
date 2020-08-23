@extends('user.layouts.fixed_layout')
@section('content')
<div class="best-scolarships-section-signed">
    <h1 class="best-scolarships-section-signed__header">Best scholarships</h1>
    <div class="best-scolarships-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">


                @forelse($scholarships as $scholarship)
                <div class="best-scolarships-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">{{$scholarship->cost->name_en}}</span>
                        <img src="{{asset('storage/'.$scholarship->picture)}}" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-scolarships-section-signed__card-header">{{$scholarship->title_en}}</h1>
                    <p class="best-scolarships-section-signed__card-paragraph">{{$scholarship->description_en}}</p>
                    <div class="best-scolarships-section-signed__card-deadline-box">
                        <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">Hours:Days:Months</h2>
                            <h3 class="deadline-value">23:23:23</h3>
                        </div>
                        <a href="{{route('user.scholarships.show',$scholarship->id)}}" class="details-button">Details</a href="#">
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
    <a href="opportunities-signed.html" class="btn-view-more">View More</a>
</div>
<div class="best-jobs-section-signed">
    <h1 class="best-jobs-section-signed__header">Best Jobs</h1>
    <div class="best-jobs-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @forelse($jobs as $job)
                <div class="best-jobs-section-signed__card swiper-slide" style="overflow: hidden;">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">
                            {{!$cost = app\Cost::find($job->cost_id)}}
                            {{$cost->name}}
                        </span>
                        <img src="/storage/{{$job->picture}}" alt="Picutre 1" class="card-picture" style="height: 162px;">
                    </div>
                    <h1 class="best-jobs-section-signed__card-header">{{$job->title_en}}</h1>
                    <p class="best-jobs-section-signed__card-paragraph">{{$job->description_en}}</p>
                    <div class="best-jobs-section-signed__card-deadline-box">
                        <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-jobs-section-signed__card-deadline">
                        <div class="deadline-number">
                            <h2 class="deadline-header">Hours:Days:Months</h2>
                            <h3 class="deadline-value">23:23:23</h3>
                        </div>
                        <a href="{{route('user.jobs.show',$job->id)}}" class="details-button">Details</a href="#">
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
    <a href="jobs-signed.html" class="btn-view-more">View More</a>
</div>
<div class="best-services-section-signed">
    <h1 class="best-services-section-signed__header">Best Services</h1>
    <div class="best-services-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @forelse($services as $service)
                <div class="best-services-section-signed__card swiper-slide">
                    <div class="card-picture-box">
                        <span class="opportunity-type-label">Fully funded</span>
                        <img src="/storage/{{$service->picture}}" alt="Picutre 1" class="card-picture">
                    </div>
                    <h1 class="best-services-section-signed__card-header">{{$service->title_en}}</h1>
                    <p class="best-services-section-signed__card-paragraph">{{$service->description_en}}</p>
                    <div class="best-services-section-signed__card-rating-box" style="padding-left: 25px;">

                        {{!$count_rate_of_ser=App\Rateser::where('ser_id', '=', $service->id)->get()->count()}} @if($count_rate_of_ser==0) @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>

                            @endfor

                            @else

                            {{!$sum_values_rate = App\Rateser::where('ser_id', '=', $service->id)->get()->avg('value_rate')}}

                            {{!$decimal_total_rate = substr($sum_values_rate, 0, 3)}}

                            {{!$integer_total_rate = substr($sum_values_rate, 0, 1)}}

                            <div hidden>
                                {{!$is_desimal = $decimal_total_rate - $integer_total_rate }}
                            </div>

                            @for ($i = 1; $i <= $integer_total_rate ; $i++) <i data-value="{{$i}}" class="fas fa-star fa-2x"></i>

                                @endfor

                                @if ($is_desimal >= .3 && $is_desimal <= 8) <i data-value="{{$i}}" class="fas fa-star-half-alt fa-2x"></i>

                                    @for ($i = $integer_total_rate  + 2; $i <= 5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>
                                        @endfor

                                        @else

                                        @for ($i = $integer_total_rate  + 1; $i <= 5; $i++) <i data-value={{$i}} class="far fa-star fa-2x"></i>

                                            @endfor


                                            @endif




                                            @endif


                                            <span class="rating-number">{{$sum_values_rate ?? 0  }}</span>
                                            <a href="{{route('user.services.show',$service->id)}}" class="details-button">Details</a href="#">
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
    <a href="services-signed.html" class="btn-view-more">View More</a>
</div>
<div class="best-organizations-section-signed">
    <h1 class="best-organizations-section-signed__header">Best Organization</h1>
    <div class="best-organizations-section-signed__cards-info">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @forelse($organizations as $organization)
                {{!$follower = App\Followersorg::where('user_id', '=', Auth::user()->id)->where('org_id', '=', $organization->id)->get()}};
                {{!$followerCount = App\Followersorg::where('org_id', '=', $organization->id)->get()->count()}};
                <div class="best-organizations-section-signed__card swiper-slide">
                    <div class="colored-container"></div>
                    <div class="logo-box" style="overflow: hidden;">
                        <img src="{{asset('storage/'.$organization->picture_org) }}" alt="Logo" class="best-jobs-section__logo">
                    </div>
                    <h1 class="best-organizations-section-signed__sub-header"> <a href="{{route('user.organizations.show',$organization->id)}}">{{$organization->name_en}}</a></h1>
                    <p class="best-organizations-section-signed__followers"><span class="follow-count" style="color: green;">{{$followerCount}}</span> follower</p>
                    <a data-orgid="{{$organization->id}}" type="button" class="best-organizations-section-signed__btn-follow add-follower" style="cursor:pointer">@if($follower->count()>0) following @else follow @endif</a>
                </div>
                @empty
                <div class="alert alert-primary" role="alert" style="transform: scale(4);">
                    No Organizations Yet
                </div>

                @endforelse


            </div>
        </div>
    </div>
    <a href="organizations-signed.html" class="btn-view-more">View More</a>
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
                    <p class="blog-card-content__subtitle-value">0</p>
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
    <a href="blogs.html" class="btn-view-more">View More</a>
</div>
@endsection

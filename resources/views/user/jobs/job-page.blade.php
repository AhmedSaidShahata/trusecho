@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang='_'.LaravelLocalization::getCurrentLocale()}}
<div class="organization-cover-pic-box">
    <img src="{{asset('storage/'.$job->picture)}}" alt="org cover pic" class="organization-cover-pic" style="height:376px; width:100%" />
    <div class="organization-profile-info-box">
        <div class="organization-profile-pic-box" style="overflow: hidden;" >
            <img src="{{asset('storage/'.$job->picture_company)}}" alt="Company Logo" class="organization-profile-pic" style="height:200px;width:200px" />
        </div>
         <div class="organization-info">
            <h1 class="organization-name">{{$job->company}}</h1>
            <div class="followers-box">
                <!-- <p class="followers-title">followers:</p>
                <p class="followers-value">956,384</p> -->
            </div>
        </div>
    </div>
</div>
<div class="org-job-section-info">
    <div class="left-panel">
        <div class="org-job-section-info__options">
            <ul class="options__list">
                <li class="options__items">
                    <a href="#" class="options__item">{{__('messages.contact_company')}}</a>
                </li>
                <hr />
                <li class="options__items">
                    <a href="#" class="options__item">{{__('messages.report')}}</a>
                </li>
            </ul>
        </div>
        <a href="#apply-for-job" class="orgs-job-apply-btn">{{__('messages.apply_now')}}</a>
    </div>
    <div class="right-panel" style="margin-bottom: 17px;">
        <h1 class="right-panel__header">
            {{$job->heading_details }}
        </h1>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.location')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$job->location }}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.salary')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$job->salary }} $</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.publish_date')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$job->created_at}}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.deadline')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$job->deadline}}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.number_app')}}:</p>
            </div>
            <div hidden>{{!$application_count = App\Jobapp::where('job_id', '=', $job->id)->get()->count()}}</div>
            <p class="right-panel__subtitle-value">
                {{$application_count}}
            </p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.email')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$job->email}}</p>
        </div>
        <p class="right-panel__description">
            {{$job->content}}
        </p>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.rate_scholar')}}:</p>
            </div>
            <div class="right-panel__subtitle-value">
                <div hidden>{{!$count_rate_of_job=App\Ratejob::where('job_id', '=', $job->id)->get()->count()}}</div>

                @if($count_rate_of_job ==0)

                @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star rate-job fa-2x"></i>

                    @endfor

                    @else

                    {{!$sum_values_rate = App\Ratejob::where('job_id', '=', $job->id)->get()->avg('value_rate')}}

                    {{!$decimal_total_rate = substr($sum_values_rate, 0, 3)}}

                    {{!$integer_total_rate = substr($sum_values_rate, 0, 1)}}

                    <div hidden>
                        {{!$is_desimal = $decimal_total_rate - $integer_total_rate}}
                    </div>

                    @for ($i = 1; $i <= $integer_total_rate; $i++) <i data-value="{{$i}}" class="fas fa-star rate-job fa-2x"></i>

                        @endfor

                        @if ($is_desimal >= .3 && $is_desimal <= 8) <i data-value="{{$i}}" class="fas fa-star-half-alt rate-job fa-2x"></i>

                            @for ($i = $integer_total_rate + 2; $i <= 5; $i++) <i data-value="{{$i}}" class="far fa-star rate-job fa-2x"></i>
                                @endfor

                                @else

                                @for ($i = $integer_total_rate + 1; $i <= 5; $i++) <i data-value={{$i}} class="far fa-star rate-job fa-2x"></i>

                                    @endfor


                                    @endif

                                    <div class="rate_div"> total rated is <span class="rate_numbers"> {{ $decimal_total_rate }}</span> from <span class="rate_numbers"> {{$count_rate_of_job }}</span> Users </div>


                                    @endif

            </div>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.job_require')}}:</p>
            </div>
        </div>
        <ul class="right-panel__job-requirements-list">
            <?php $requirments_exp = explode("-", $job->requirments) ?>

            @foreach($requirments_exp as $requirment)
            <li class="right-panel__job-requirements-item">
                {{$requirment}}
            </li>
            @endforeach

        </ul>
        <div class="job-comments">
            <div class="job-comments__content-box" style="width: 100%;">
                <div class="job-comments__header">
                    <span class="job-comments__word">{{__('messages.comments')}}</span>
                    <hr class="horizontal-line" />
                </div>
                <div class="job-comments__send-box">
                    <textarea id="blog-comment" cols="30" rows="7" class="job-comments__content comment-job" placeholder="Please write your comments here..."></textarea>
                    <a type="button" class="job-comments__send-icon add-comment" method="POST">
                        <img src="{{asset('img/Send blue icon.png')}}" alt="send " class="send-icon" />
                    </a>
                </div>
                <div class="job-comments__reviews">
                    @auth
                    <span hidden class="commentor-id">{{ Auth::user()->id }}</span>
                    <span hidden class="commentor-name">{{ Auth::user()->name }}</span>
                    <span hidden class="commentor-image">{{Auth::user()->profile->picture}}</span>
                    <span hidden class="job-id">{{$job->id}}</span>
                    @endauth



                    @foreach($comment_jobs as $comment_job)
                    <hr>
                    <div class="user-job-comment">
                        <div class="user-job-pic-box">
                            <img src="{{asset('storage/'.Auth::user()->profile->picture)}}" alt="user pic" class="user-job-pic" />
                        </div>
                        <div class="user-job-details">
                            <h1 class="user-job-name">{{ $comment_job->user->name }}</h1>
                            <p class="user-job-comment-paragraph">
                                {{$comment_job->body}}
                            </p>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup" id="apply-for-job">
    <div class="popup__content">
        <div class="popup__left">
            <h1 class="popup__header">{{__('messages.apply_job')}}</h1>
            <div class="header__underline"></div>
            <form action="{{route('user.jobapps.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- class="add-cv-input" -->
                <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.add_cv')}}</h3>
                <input type="file" id="" name="cv" />
                <!-- <div class="add-cv">

                    <div class="add-cv__title-box">
                        <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="add-cv-icon" />

                    </div>
                </div> -->

                <div class="applying-for-job-illustration-box">
                    <img src="{{asset('img/applying-for-a-job.svg')}}" alt="apply for job" class="applying-for-job-illustration" />
                </div>
        </div>
        <div class="popup__right">
            <a href="#tours_section" class="popup__closing">×</a>

            <div class="input">
                <label for="fullname" class="popup__label-style">{{__('messages.full_name')}}</label>
                <input type="text" id="fullname" name="fullname" class="popup__input-style" placeholder="{{__('messages.full_name')}}..." />
            </div>
            <div class="input">
                <label for="email" class="popup__label-style">{{__('messages.email')}}</label>
                <input type="email" id="email" name="email" class="popup__input-style" placeholder="{{__('messages.email')}}..." />
            </div>
            <div class="input">
                <label for="phone" class="popup__label-style">{{__('messages.phone_number')}}</label>
                <input type="text" id="phone-number" name="phone" class="popup__input-style" placeholder="{{__('messages.phone_number')}}..." />
            </div>
            <div class="input">
                <label for="message" class="popup__label-style">{{__('messages.message')}}</label>
                <textarea id="message" name="message" rows="3" cols="60" class="input-message" placeholder="{{__('messages.message')}}...."></textarea>
            </div>
            <input type="hidden" value="{{$job->id}}" name="job_id">
            <button class="input-btn" type="submit">{{__('messages.submit')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection

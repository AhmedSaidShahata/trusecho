@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang=LaravelLocalization::getCurrentLocale()}}

@auth
<span hidden class="commentor-name">{{ Auth::user()->name }}</span>
<span hidden class="commentor-image">{{Auth::user()->profile->picture}}</span>
@endauth
<div class="organization-cover-pic-box">
    <img src="{{asset('storage/'.$org->picture_cover)}}" alt="org cover pic" class="organization-cover-pic" style="height:376px; width:100%" />
    <div class="organization-profile-info-box">
        <div class="organization-profile-pic-box" style="overflow: hidden;">
            <img src="{{asset('storage/'.$org->picture_org)}}" alt="Company Logo" class="organization-profile-pic" style="height:200px;width:200px" />
        </div>
        <div class="organization-info">
            <h1 class="organization-name">{{$org->name}}</h1>
            <div class="followers-box">
                <p class="followers-title">{{__('messages.followers')}}:</p>
                <div hidden>
                    @auth
                    {{!$follower = App\Followersorg::where('user_id', '=', Auth::user()->id)->where('org_id', '=', $org->id)->get()}}
                    @endauth

                    {{!$followerCount = App\Followersorg::where('org_id', '=', $org->id)->get()->count()}}

                </div>
                <p class="followers-value">{{$followerCount}}</p>
            </div>
        </div>
    </div>
</div>


<div class="org-job-section-info" style="padding:12px">
    <div class="left-panel">
        <div class="org-job-section-info__options">
            <ul class="options__list">
                <li class="options__items">
                    <a href="organization-page-about.html" class="options__item">

                        {{__('messages.about')}}

                    </a>
                </li>
                <hr />
                <li class="options__items">
                    <a href="#" class="options__item">

                        {{__('messages.news')}}
                    </a>
                </li>
            </ul>
        </div>
        <div class="org-job-section-info__options u-margin-top-small">
            <ul class="options__list">
                <li class="options__items">
                    <a href="{{route('user.contacts.index')}}" class="options__item">{{__('messages.contact_us')}}</a>
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
        @auth
        <a href="#apply-for-job" class="my-btn" style="margin: 30px 34px;">
            <i class="fas fa-plus"></i>
            {{__('messages.new_post')}}
        </a>
        @endauth
    </div>
    <div class="posts-section">

        @forelse($news_org as $new_org)
        <div class="post">
            <div class="post-user-info">
                <div class="post-user-info__pic-box">
                    <img src="{{asset('storage/'.$new_org->organization->user->profile->picture)}}" alt="post-user-pic" class="post-user-info__pic" />
                </div>
                <div class="post-user-info__details">
                    <h1 class="post-user-info__details-name">{{$new_org->organization->user->name}}</h1>
                    <h2 class="post-user-info__details-job">{{$new_org->organization->name}}</h2>
                    <h3 class="post-user-info__details-time">

                        <div hidden>
                            {{!$created=$org->created_at->format('Y-m-d')}}
                            {{$mytime = Carbon\Carbon::now()->format('Y-m-d')}}
                            {{!$start_date = \Carbon\Carbon::createFromFormat('Y-m-d',$created)}}
                            {{!$end_date = \Carbon\Carbon::createFromFormat('Y-m-d',$mytime)}}
                            {{!$different_days = $start_date->diffInDays($end_date)}}
                            {{!$different_hours = $start_date->diffInHours($end_date)}}
                            {{!$different_months = $start_date->diffInMonths($end_date)}}

                            {{!$created2=$org->created_at->format('H-i-s')}}
                            {{$mytime2 = Carbon\Carbon::now()->format('H-i-s')}}
                            {{!$start_date = \Carbon\Carbon::createFromFormat('H-i-s',$created2)}}
                            {{!$end_date = \Carbon\Carbon::createFromFormat('H-i-s',$mytime2)}}
                            {{!$different_min = $start_date->diffInMinutes($end_date)}}

                        </div>
                        @if($different_hours <= 0) {{$different_min}} {{__('messages.m')}} @elseif($different_hours>0)
                            {{$different_hours}} {{__('messages.h')}}
                            @else

                            @endif

                    </h3>
                </div>
            </div>
            <h1 class="post-user-info__title">{{$new_org->title }}</h1>
            <p class="post-user-info__description">
                {{$new_org->description }}
            </p>
            <div class="post-user-info__sub-details-box">
                <div class="post-user-info__sub-subtitle-box">
                    <p class="post-user-info__subtitle">{{__('messages.deadline')}}</p>
                </div>
                <p class="post-user-info__subtitle-value"> {{$new_org->deadline }}</p>
            </div>
            <div class="post-pic-box">
                <img src="{{asset('storage/'.$new_org->picture)}}" alt="Post pic" class="post-pic" style="height: 180px;" />
            </div>
            <div class="post-interaction-panel">
                @auth
                {{!$like = App\Newslike::where('user_id', '=', Auth::user()->id)->where('newsorg_id', '=', $new_org->id)->get()}}

                <div class="post-interaction-panel__control like-news {{$like->count()>0?'blue':''}}" data-newsid="{{$new_org->id}}">
                    <i class="fas fa-thumbs-up fa-2x"></i>
                    <span class="post-control-name">{{__('messages.like')}}</span>
                </div>
                @endauth
                @guest
                <div class="post-interaction-panel__control">
                    <i class="fas fa-thumbs-up fa-2x"></i>
                    <span class="post-control-name">{{__('messages.like')}}</span>
                </div>
                @endauth
                <div class="post-interaction-panel__control">
                    <img src="{{asset('img/Icon awesome-comment.svg')}}" alt="comment" class="post-btn" />
                    <span class="post-control-name">{{__('messages.comments')}}</span>
                </div>
                <div class="post-interaction-panel__control">
                    <img src="{{asset('img/Icon awesome-share-alt.svg')}}" alt="share" class="post-btn" />
                    <span class="post-control-name">{{__('messages.share')}}</span>
                </div>
            </div>
            <div class="comments-container" style="height: 200px; overflow-y:auto">






                @foreach($new_org->comments as $comment)
                <div class="post-comment ">
                    <div class="post-comment-pic-box">
                        <img src="{{asset('/storage/'.$comment->user->profile->picture)}}" alt="user pic" class="post-comment-pic" />
                    </div>
                    <div class="post-comment-details">
                        <h1 class="post-comment-name">{{$comment->user->name}}</h1>
                        <p class="post-comment-paragraph">
                            {{$comment->body}}
                        </p>
                    </div>
                </div>


                @endforeach

            </div>

            <div class="post comment-input">
                <div class="post-comment">
                    <div class="post-comment-pic-box">
                        @auth
                        <img src="{{asset('storage/'.Auth::user()->profile->picture)}}" alt="user pic" class="post-comment-pic" />
                        @endauth
                    </div>
                    <div class="post-comment-details">

                        <p class="post-comment-paragraph">
                            <input type="text" class="comment-news" placeholder="{{__('messages.write_comment')}}">
                            <a type="button" class="comments-section__send-icon ">
                                <img src="{{asset('img/Send blue icon.png')}}" alt="send " class="send-icon add-comment-news" data-newsid='{{$new_org->id}}' />
                            </a>
                        </p>

                    </div>
                </div>
            </div>

        </div>

        @empty
        <div class="alert alert-danger" role="alert" style="font-size: 20px;">
            {{__('messages.no_news')}}
        </div>
        @endforelse


    </div>
</div>

<div class="popup" id="apply-for-job" style="overflow: auto;">
    <form action="{{route('user.newsorgs.store')}}" method="post" enctype="multipart/form-data">
        <div class="popup__content" style="">
            <div class="popup__left">
                <h1 class="popup__header">{{__('messages.add_post')}}</h1>
                <div class="header__underline"></div>

                @csrf

                <input required type="hidden" name="lang" value="{{$lang}}">

                <input required type="hidden" name="organization_id" value="{{$org->id}}">
                <!-- class="add-cv-input" -->
                <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.picture')}}</h3>

                <div class="add-cv">
                    <div class="add-cv__title-box">
                        <img src="{{asset('img/adding icon.svg')}}" alt="add icon" class="add-cv-icon" />
                        <input type="file" name="picture" accept="image/*" onchange="showPreview(event);" />
                    </div>
                </div>

                <div class="applying-for-job-illustration-box">
                    <img src="{{asset('img/applying-for-a-job.svg')}}" alt="apply for job" class="applying-for-job-illustration" />
                </div>
            </div>
            <div class="popup__right" style="position: relative;">
                <a href="#tours_section" class="popup__closing">×</a>

                <div class="input">
                    <label for="fullname" class="popup__label-style">{{__('messages.title')}}</label>
                    <input required type="text" name="title" class="popup__input-style" />
                </div>

                <div class="input">
                    <label class="popup__label-style">{{__('messages.deadline')}}</label>
                    <input required type="date" name="deadline" class="popup__input-style" />
                </div>

                <div class="input">
                    <label for="message" class="popup__label-style">{{__('messages.description')}}</label>
                    <textarea name="description" rows="3" cols="60" class="input-message"></textarea>
                </div>

                <input required class="input-btn" type="submit" value="{{__('messages.submit')}}">

            </div>
        </div>
    </form>
</div>

@endsection

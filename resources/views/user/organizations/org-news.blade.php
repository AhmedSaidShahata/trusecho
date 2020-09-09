@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang='_'.LaravelLocalization::getCurrentLocale()}}

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
            <h1 class="organization-name">{{$org->{'name'.$lang} }}</h1>
            <div class="followers-box">
                <p class="followers-title">{{__('messages.followers')}}:</p>
                <p class="followers-value">0</p>
            </div>
        </div>
    </div>
</div>


<div class="org-job-section-info">
    <div class="left-panel">
        <div class="org-job-section-info__options">
            <ul class="options__list">
                <li class="options__items">
                    <a href="organization-page-about.html" class="options__item">About</a>
                </li>
                <hr />
                <li class="options__items">
                    <a href="#" class="options__item">News</a>
                </li>
            </ul>
        </div>
        <div class="org-job-section-info__options u-margin-top-small">
            <ul class="options__list">
                <li class="options__items">
                    <a href="#" class="options__item">contact us</a>
                </li>
                <hr />
                <li class="options__items">
                    <a href="#" class="options__item">Call us</a>
                </li>
                <li class="options__items">
                    <a href="#" class="options__item">Report a problem</a>
                </li>
            </ul>
        </div>
        <a href="#" class="orgs-job-new-post-btn">
            <img src="{{asset('img/add-icon.svg')}}" alt="add-icon" class="contact-icon" />
            new post
        </a>
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
                    <h2 class="post-user-info__details-job">{{$new_org->organization->{'name'.$lang} }}</h2>
                    <h3 class="post-user-info__details-time">0h</h3>
                </div>
            </div>
            <h1 class="post-user-info__title">{{$new_org->{'title'.$lang} }}</h1>
            <p class="post-user-info__description">
                {{$new_org->{'description'.$lang} }}
            </p>
            <div class="post-user-info__sub-details-box">
                <div class="post-user-info__sub-subtitle-box">
                    <p class="post-user-info__subtitle">{{__('messages.deadline')}}</p>
                </div>
                <p class="post-user-info__subtitle-value"> {{$new_org->deadline }}</p>
            </div>
            <div class="post-pic-box">
                <img src="{{asset('storage/'.$new_org->picture)}}" alt="Post pic" class="post-pic"  style="height: 180px;"/>
            </div>
            <div class="post-interaction-panel">
                {{!$like = App\Newslike::where('user_id', '=', Auth::user()->id)->where('newsorg_id', '=', $new_org->id)->get()}};
                <div class="post-interaction-panel__control like-news {{$like->count()>0?'blue':''}}" data-newsid="{{$new_org->id}}">
                    <i class="fas fa-thumbs-up fa-2x"></i>
                    <span class="post-control-name">Like</span>
                </div>
                <div class="post-interaction-panel__control">
                    <img src="{{asset('img/Icon awesome-comment.svg')}}" alt="comment" class="post-btn" />
                    <span class="post-control-name">Comment</span>
                </div>
                <div class="post-interaction-panel__control">
                    <img src="{{asset('img/Icon awesome-share-alt.svg')}}" alt="share" class="post-btn" />
                    <span class="post-control-name">Share</span>
                </div>
            </div>
            <div class="comments-container" style="height: 200px; overflow-y:auto">




            <div class="post-comment ">
                    <div class="post-comment-pic-box">
                        <img src="{{asset('img/user-comment-pic.png')}}" alt="user pic" class="post-comment-pic" />
                    </div>
                    <div class="post-comment-details">
                        <h1 class="post-comment-name">Taylor Adams</h1>
                        <p class="post-comment-paragraph">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste
                            in beatae praesentium dolores porro, nobis labore ut omnis, nam
                            temporibus neque inventore culpa dolore reiciendis molestias
                            optio libero? Velit debitis eligendi necessitatibus enim ratione
                            cupiditate
                        </p>
                    </div>
                </div>

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
                        <img src="{{asset('storage/'.Auth::user()->profile->picture)}}" alt="user pic" class="post-comment-pic" />
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
        <div class="alert alert-danger" role="alert">
            No News Yet
        </div>
        @endforelse


    </div>
</div>

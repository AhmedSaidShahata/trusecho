@extends('user.layouts.fixed_layout')
@section('content')
<span hidden class="lang">{{$lang='_'.LaravelLocalization::getCurrentLocale()}}</span>
<div class="blog-summary">
    <div class="blog-summary__info">
        <div class="blog-summary__details">
            <h1 class="blog-summary__details-header">{{$blog->title }}</h1>

            <p class="blog-summary__details-brief">
                {{$blog->description }}
            </p>
            <p class="blog-summary__details-quick-summary">
                {{$blog->content }}
            </p>
            <div class="blog-summary__details-comments">
                <h1 class="comments">{{__('messages.comments')}}:</h1>
                <p class="comments__values"></p>
            </div>
            <div class="blog-summary__details-views">
                <h1 class="views">{{__('messages.views')}}:</h1>
                <p class="views__values">{{$views_count}}</p>
            </div>
            <div class="blog-summary__details-rate">
                <h1 class="rate">{{__('messages.rate')}}:</h1>
                <div class="rate-total">
                    <div hidden>{{!$count_rate_of_blog=App\Rateblog::where('blog_id', '=', $blog->id)->get()->count()}} </div>

                    @if($count_rate_of_blog ==0)

                    @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>

                        @endfor

                        @else

                        {{!$sum_values_rate = App\Rateblog::where('blog_id', '=', $blog->id)->get()->avg('value_rate')}}

                        {{!$decimal_total_rate = substr($sum_values_rate, 0, 3)}}

                        {{!$integer_total_rate = substr($sum_values_rate, 0, 1)}}

                        <div hidden>
                            {{!$is_desimal = $decimal_total_rate - $integer_total_rate}}
                        </div>

                        @for ($i = 1; $i <= $integer_total_rate; $i++) <i data-value="{{$i}}" class="fas fa-star fa-2x"></i>

                            @endfor

                            @if ($is_desimal >= .3 && $is_desimal <= 8) <i data-value="{{$i}}" class="fas fa-star-half-alt fa-2x"></i>

                                @for ($i = $integer_total_rate + 2; $i <= 5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>
                                    @endfor

                                    @else

                                    @for ($i = $integer_total_rate + 1; $i <= 5; $i++) <i data-value={{$i}} class="far fa-star fa-2x"></i>

                                        @endfor


                                        @endif

                                        <div class="rate_div"> total rated is <span class="rate_numbers"> {{ $decimal_total_rate }}</span> from <span class="rate_numbers"> {{$count_rate_of_blog }}</span> Users </div>


                                        @endif
                </div>

            </div>
        </div>
        <div class="blog-summary__picutre-box" style="padding: 0 60px;">
            <div class="blog-summary__favourite">
                {{!$favourite = App\Favblog::where('user_id', '=', Auth::user()->id)->where('blog_id', '=', $blog->id)->get()}}

                <div class="blog-summary__favourite-icon-box">
                    <i data-blogid="{{$blog->id}}" class="fas fa-heart fa-2x  add-fav-blog {{$favourite->count()>0?'red':''}}"></i>
                </div>
                <h1 class="blog-summary__favourite-word">{{__('messages.add_fav')}}</h1>
            </div>
            <img src="{{asset('storage/'.$blog->picture)}}" alt="single post pic" class="blog-summary__picture" style="width:582px;height:490px;border-radius:20px" />
        </div>
    </div>
</div>
<div class="blog-details">
    <div class="blog-details__content-box" style="padding:0 30px">
        <h1 class="blog-details__header">{{__('messages.description')}}</h1>
        <p class="blog-details__paragraph">
            {{$blog->content }}
        </p>
        {{!$like = App\Likeblog::where('user_id', '=', Auth::user()->id)->where('blog_id', '=', $blog->id)->get()}}
        <div class="blog-details__buttons">

            <button data-blogid="{{$blog->id}}" class=" blog-like {{$like->count()>0?'blue':''}}">
                <span class="like-title  ">
                    {{__('messages.like')}} <i class="fas fa-thumbs-up"></i>
                </span>
            </button>

            <div class="sharethis-inline-share-buttons" style="padding:10px 30px"></div>

        </div>
        <div class="blog-details__social-media">
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="{{asset('img/facebook.png')}}" alt="facebook" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="{{asset('img/instagram.png')}}" alt="instagram" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="{{asset('img/telegram.png')}}" alt="telegram" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="{{asset('img/twitter.png')}}" alt="twitter" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="{{asset('img/linkedin.png')}}" alt="linkedin" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="{{asset('img/Truescho logo-edit.png')}}" alt="truescho" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
        </div>
        <div class="blog-details__rating">
            <h1 class="blog-details__rating-header">{{__('messages.rate_blog')}}</h1>
            <div class="blog-details__rating-stars-box">
                <div class="rating">
                    <div class="rate_user" blog_id="{{$blog->id}}">
                        @auth

                        {{!$rate_user=App\Rateblog::where('user_id', '=',Auth::user()->id)->where('blog_id', '=', $blog->id)->get()}}

                        @if($rate_user->count() ==0)

                        @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star rate-blog fa-2x"></i>
                            @endfor

                            @else

                            @foreach($rate_user as $r)
                            {{!$rate_val=$r->value_rate}}
                            @endforeach

                            @for ($i = 1; $i <= $rate_val; $i++) <i data-value="{{$i}}" class="fas fa-star rate-blog fa-2x"></i>

                                @endfor

                                @for ($i = $rate_val+1; $i <=5; $i++) <i data-value="{{$i}}" class="far fa-star rate-blog fa-2x"></i>

                                    @endfor

                                    @endif
                                    @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@auth
<span hidden class="commentor-blog-id">{{ Auth::user()->id }}</span>
<span hidden class="commentor-blog-name">{{ Auth::user()->name }}</span>
<span hidden class="commentor-blog-image">{{Auth::user()->profile->picture}}</span>
<span hidden class="blog-id">{{$blog->id}}</span>
@endauth
<div class="comments-section">
    <div class="comments-section__content-box" style="padding: 38px;">
        <div class="comments-section__header">
            <span class="comments-section__word">{{__('messages.comments')}}</span>
            <hr class="horizontal-line" />
        </div>
        <div class="comments-section__send-box">
            <textarea name="comment" id="blog-comment" cols="30" rows="7" class="comment-blog comments-section__content"></textarea>
            <a type="button" class="comments-section__send-icon add-comment-blog">
                <img src="{{asset('img/Send blue icon.png')}}" alt="send " class="send-icon" />
            </a>
        </div>
        <div class="comments-section__reviews">



            @foreach($comments as $comment)
            <hr>
            <div class="user-comment">
                <div class="user-pic-box">
                    <img src="{{asset('storage/'.$comment->user->profile->picture)}}" alt="user pic" class="user-job-pic" style="height:60px;width:60px" />
                </div>
                <div class="user-details">
                    <h1 class="user-name">{{ $comment->user->name }}</h1>
                    <p class="user-comment-paragraph">
                        {{$comment->body}}
                    </p>
                </div>
            </div>

            @endforeach




        </div>
        <h1 class="related-topics__header">{{__('messages.related_topic')}}</h1>
        <div class="related-topics__cards">

            @forelse($related_blogs as $related_blog )

            <div class="blogs-detailed-results__card responsive">
                <div class="blogs-detailed-results__pic-box">
                    <img src="{{asset('storage/'.$related_blog->picture)}}" alt="blogs pic" class="blogs-detailed-results__pic responsive-pic" />
                </div>
                <div class="blogs-card-content">
                    <h1 class="blogs-card-content__header">{{$related_blog->title }}</h1>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">{{__('messages.comments')}}:</p>
                        <p class="blogs-card-content__subtitle-value">
                            {{!$comments=App\Blogcomment::where(['blog_id'=>$related_blog->id]) }}
                            {{$comments->get()->count()}}
                        </p>
                    </div>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">{{__('messages.participants')}}:</p>
                        <p class="blogs-card-content__subtitle-value">1</p>
                    </div>
                </div>
                <a href="{{route('user.blogs.show',$related_blog->id)}}" class="blogs-detailed-results__btn">{{__('messages.visit')}}</a>
            </div>

            @empty

            <div  role="alert" style="transform: scale(3);height:120px;justify-content: center;align-items: center;display: flex; width:100%">
               <p>{{__('messages.no_related_blogs')}}</p>
            </div>



            @endforelse





        </div>
    </div>
</div>





@endsection

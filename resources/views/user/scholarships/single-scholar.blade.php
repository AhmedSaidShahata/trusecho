@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang='_'.LaravelLocalization::getCurrentLocale()}}
<div class="blog-summary">
    <div class="blog-summary__info" style="width: auto;">
        <div class="blog-summary__details">
            <h1 class="blog-summary__details-header">{{$scholarship->title }}</h1>
            <p class="blog-summary__details-brief">
                {{$scholarship->description }}
            </p>

            <div class="blog-summary__details-comments">
                <h1 class="comments">{{__('messages.comments')}}:</h1>
                <p class="comments__values">0</p>
            </div>
            <div class="blog-summary__details-views">
                <h1 class="views">{{__('messages.views')}}:</h1>
                <p class="views__values">{{$views_count}}</p>
            </div>

            <div class="blog-summary__details-views">
                <h1 class="views">{{__('messages.location')}}:</h1>
                <p class="views__values">
                    {{ $scholarship->location }}
                </p>
            </div>

            <div class="blog-summary__details-views">
                <h1 class="views">{{__('messages.email')}}:</h1>
                <p class="views__values">{{ $scholarship->email}} </p>
            </div>


            <div class="blog-summary__details-views">
                <h1 class="views">{{__('messages.deadline')}}:</h1>
                <p class="views__values"> {{ $scholarship->deadline}}</p>
            </div>

            <div class="blog-summary__details-rate">
                <h1 class="rate">{{__('messages.rate')}}:</h1>
                <div class="rate-total-scholar">
                    <div hidden>{{!$count_rate_of_scholar=App\Scholarshiprate::where('scholarship_id', '=', $scholarship->id)->get()->count()}} </div>

                    @if($count_rate_of_scholar ==0)

                    @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star fa-2x"></i>

                        @endfor

                        @else

                        {{!$sum_values_rate = App\Scholarshiprate::where('scholarship_id', '=', $scholarship->id)->get()->avg('value_rate')}}

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

                                        <div class="rate_div"> total rated is <span class="rate_numbers"> {{ $decimal_total_rate }}</span> from <span class="rate_numbers"> {{$count_rate_of_scholar }}</span> Users </div>


                                        @endif
                </div>

            </div>

            <a href="{{route('user.appscholars.show',$scholarship->id)}}" class="orgs-job-apply-btn my-apply" style="font-size: 18px;">{{__('messages.apply_now')}}</a>
        </div>
    </div>

    <div class="blog-summary__picutre-box">
        @auth
        <div class="blog-summary__favourite">

            {{!$favourite = App\Favscholar::where('user_id', '=', Auth::user()->id)->where('scholarship_id', '=', $scholarship->id)->get()}};
            <div class="blog-summary__favourite-icon-box">
                <i data-scholarid="{{$scholarship->id}}" class="fas fa-heart fa-2x  add-fav-scholar {{$favourite->count()>0?'red':''}}"></i>
            </div>
            <h1 class="blog-summary__favourite-word">{{__('messages.add_fav')}}</h1>
        </div>
        @endauth

        @guest
        <div class="blog-summary__favourite">
            <div class="blog-summary__favourite-icon-box">
                <i class="fas fa-heart fa-2x "></i>
            </div>
            <h1 class="blog-summary__favourite-word">{{__('messages.add_fav')}}</h1>
        </div>
        @endguest
        <img src="{{asset('storage/'.$scholarship->picture)}}" alt="single post pic" class="blog-summary__picture" style="width:582px;height:490px;border-radius:20px;margin:0 10px;" />
    </div>
</div>
</div>
<div class="blog-details">
    <div class="blog-details__content-box" style="padding: 10px; ">
        <h1 class="blog-details__header">{{__('messages.description')}}</h1>
        <p class="blog-details__paragraph">
            {{$scholarship->description }}
        </p>


        <div class="blog-details__buttons">
            @auth
            {{!$like = App\Likescholar::where('user_id', '=', Auth::user()->id)->where('scholarship_id', '=', $scholarship->id)->get()}};
            <button class=" like_scholar {{$like->count()>0?'blue':''}}" data-scholarid="{{$scholarship->id}}">
                <span class="like-title  ">
                    {{__('messages.like')}} <i class="fas fa-thumbs-up"></i>
                </span>

            </button>
            @endauth

            @guest

            <button class=" like_scholar">
                <span class="like-title  ">
                    {{__('messages.like')}} <i class="fas fa-thumbs-up"></i>
                </span>

            </button>
            @endguest
            <button class="blog-details__buttons-share" style="margin: 0  10px;">
                <img src="{{asset('img/share-icon.svg')}}" alt="share icon" class="share-button" />
                <span class="share-title">{{__('messages.share')}}</span>
            </button>
        </div>
        <!-- <div class="blog-details__social-media">
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
        </div> -->
        <div class="blog-details__rating">
            <h1 class="blog-details__rating-header">{{__('messages.rate_scholar')}}</h1>
            <div class="blog-details__rating-stars-box">
                <div class="rating">
                    <div class="rate_user-scholar" scholar_id="{{$scholarship->id}}">
                        @auth

                        {{!$rate_user=App\Scholarshiprate::where('user_id', '=',Auth::user()->id)->where('scholarship_id', '=', $scholarship->id)->get()}}

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
<div class="comments-section">
    <div class="comments-section__content-box" style="padding: 20px;">
        <div class="comments-section__header">
            <span class="comments-section__word">{{__('messages.comments')}}</span>
            <hr class="horizontal-line" />
        </div>
        <div class="comments-section__send-box" style="position: relative; left:-10%">
            <textarea name="comment" id="blog-comment" cols="30" rows="7" class="comments-section__content comment-scholar" style="width:70%"></textarea>
            <a type="button" class="comments-section__send-icon add-comment-scholar">
                <img src="{{asset('img/Send blue icon.png')}}" alt="send " class="send-icon" />
            </a>
        </div>
        <div class="comments-section__reviews-scholar">
            @auth
            <span hidden class="commentor-id">{{ Auth::user()->id }}</span>
            <span hidden class="commentor-name">{{ Auth::user()->name }}</span>
            <span hidden class="commentor-image">{{Auth::user()->profile->picture}}</span>
            <span hidden class="scholar-id">{{$scholarship->id}}</span>
            @endauth
            <div class="user-comment">
                <div class="user-pic-box">
                    <img src="{{asset('img/user-comment-pic.png')}}" alt="user pic" class="user-pic" />
                </div>
                <div class="user-details">
                    <h1 class="user-name">Taylor Adams</h1>
                    <p class="user-comment-paragraph">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste
                        in beatae praesentium dolores porro, nobis labore ut omnis, nam
                        temporibus neque inventore culpa dolore reiciendis molestias
                        optio libero? Velit debitis eligendi necessitatibus enim ratione
                        cupiditate, veritatis facere? Sapiente iure quos tempora quasi
                        quo fugit suscipit consequuntur qui neque dolorem voluptate
                        temporibus, fugiat provident corporis delectus. Explicabo magnam
                        culpa amet modi facere exercitationem deleniti fugit ab minima
                        reiciendis numquam rerum officiis, nemo dolorem natus ipsa!
                        Repudiandae, veniam? Eligendi molestias debitis culpa iure
                        harum, esse id qui fuga reiciendis nobis dolorem repellat
                        perspiciatis neque amet vero itaque odit ipsum dolores eveniet
                        accusamus.
                    </p>
                </div>
            </div>
            <hr>
            @foreach($comment_scholarships as $comment_scholarship)
            <div class="user-comment">
                <div class="user-pic-box">
                    <img src="{{asset('storage/'.$comment_scholarship->user->profile->picture)}}" alt="user pic" class="user-job-pic" style="width: 60px; height:60px" />
                </div>
                <div class="user-details">
                    <h1 class="user-name">{{$comment_scholarship->user->name }}</h1>
                    <p class="user-comment-paragraph">
                        {{$comment_scholarship->body}}
                    </p>
                </div>
            </div>
            <hr>
            @endforeach

            <hr />
        </div>
        <h1 class="related-topics__header">Related Scholarships</h1>
        <div class="best-scolarships-section-signed__cards-info">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @forelse($related_scholarships as $related_scholarship)
                    <div class="best-scolarships-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label my-label-span">{{ $related_scholarship->cost->name }}</span>
                            <img src="{{asset('storage/'.$related_scholarship->picture)}}" alt="Picutre 1" class="card-picture my-image">
                        </div>
                        <h1 class="best-scolarships-section-signed__card-header">{{ $related_scholarship->title}}</h1>
                        <p class="best-scolarships-section-signed__card-paragraph">{{ $related_scholarship->description}}</p>
                        <div class="best-scolarships-section-signed__card-deadline-box">
                            <img src="{{asset('img/Icon ionic-ios-timer.svg')}}" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                            <div class="deadline-number">
                                <h2 class="deadline-header">{{__('messages.hours')}}:{{__('messages.days')}}:{{__('messages.months')}}</h2>
                                <div hidden> {{!$created=$related_scholarship->created_at->format('Y-m-d')}}
                                    {{!$deadline=$related_scholarship->deadline}}
                                    {{!$start_date = \Carbon\Carbon::createFromFormat('Y-m-d',$created)}}
                                    {{!$end_date = \Carbon\Carbon::createFromFormat('Y-m-d',$deadline)}}
                                    {{!$different_days = $start_date->diffInDays($end_date)}}
                                    {{!$different_hours = $start_date->diffInHours($end_date)}}
                                    {{!$different_months = $start_date->diffInMonths($end_date)}}
                                </div>

                                <h3 class="deadline-value">{{ $different_hours}}:{{ $different_days}}:{{ $different_months}}</h3>


                            </div>
                            <a href="{{route('user.scholarships.show',$related_scholarship->id)}}" class="details-button">{{__('messages.details')}}</a>
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
    </div>
</div>

@endsection

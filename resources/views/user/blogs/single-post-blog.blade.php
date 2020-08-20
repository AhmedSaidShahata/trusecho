@extends('user.layouts.fixed_layout')
@section('content')
<div class="blog-summary">
    <div class="blog-summary__info">
        <div class="blog-summary__details">
            <h1 class="blog-summary__details-header">{{$blog->title_en}}</h1>
            <p class="blog-summary__details-brief">
                {{$blog->description_en}}
            </p>
            <p class="blog-summary__details-quick-summary">
                {{$blog->content_en}}
            </p>
            <div class="blog-summary__details-comments">
                <h1 class="comments">Comments:</h1>
                <p class="comments__values">21021</p>
            </div>
            <div class="blog-summary__details-views">
                <h1 class="views">views:</h1>
                <p class="views__values">21021</p>
            </div>
            <div class="blog-summary__details-rate">
                <h1 class="rate">Rate:</h1>
                <img src="img/star-rating.svg" alt="star" class="rate-star" />
            </div>
        </div>
        <div class="blog-summary__picutre-box">
            <div class="blog-summary__favourite">
                <div class="blog-summary__favourite-icon-box">
                    <img src="img/heart-icon.svg" alt="heart icon" class="blog-summary__favourite-icon" />
                </div>
                <h1 class="blog-summary__favourite-word">add to Favourite</h1>
            </div>
            <img src="{{asset('storage/'.$blog->picture)}}" alt="single post pic" class="blog-summary__picture" style="width:582px;height:490px;border-radius:20px" />
        </div>
    </div>
</div>
<div class="blog-details">
    <div class="blog-details__content-box">
        <h1 class="blog-details__header">Description</h1>
        <p class="blog-details__paragraph">
            {{$blog->cotent_en}}
        </p>
        <div class="blog-details__buttons">
            <button class="blog-details__buttons-like">
                <img src="img/like-button.svg" alt="like icon" class="like-button" />
                <span class="like-title">Like</span>
            </button>
            <button class="blog-details__buttons-share">
                <img src="img/share-icon.svg" alt="share icon" class="share-button" />
                <span class="share-title">Share</span>
            </button>
        </div>
        <div class="blog-details__social-media">
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="img/facebook.png" alt="facebook" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="img/instagram.png" alt="instagram" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="img/telegram.png" alt="telegram" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="img/twitter.png" alt="twitter" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="img/linkedin.png" alt="linkedin" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
            <div class="social-media">
                <div class="social-media__logo-box">
                    <img src="img/Truescho logo-edit.png" alt="truescho" class="social-media__logo" />
                </div>
                <span class="social-media__number">+1,001,564</span>
            </div>
        </div>
        <div class="blog-details__rating">
            <h1 class="blog-details__rating-header">Rate this topic</h1>
            <div class="blog-details__rating-stars-box">
                <div class="rating">
                    <input type="radio" name="rating" id="rating-5">
                    <label for="rating-5"></label>
                    <input type="radio" name="rating" id="rating-4">
                    <label for="rating-4"></label>
                    <input type="radio" name="rating" id="rating-3">
                    <label for="rating-3"></label>
                    <input type="radio" name="rating" id="rating-2">
                    <label for="rating-2"></label>
                    <input type="radio" name="rating" id="rating-1">
                    <label for="rating-1"></label>
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
    <div class="comments-section__content-box">
        <div class="comments-section__header">
            <span class="comments-section__word">Comments</span>
            <hr class="horizontal-line" />
        </div>
        <div class="comments-section__send-box">
            <textarea name="comment" id="blog-comment" cols="30" rows="7" class="comment-blog comments-section__content"></textarea>
            <a type="button" class="comments-section__send-icon add-comment-blog">
                <img src="{{asset('img/Send blue icon.png')}}" alt="send " class="send-icon" />
            </a>
        </div>
        <div class="comments-section__reviews">


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

        </div>
        <h1 class="related-topics__header">Related Topics</h1>
        <div class="related-topics__cards">
            <div class="blogs-detailed-results__card responsive">
                <div class="blogs-detailed-results__pic-box">
                    <img src="img/education.svg" alt="blogs pic" class="blogs-detailed-results__pic responsive-pic" />
                </div>
                <div class="blogs-card-content">
                    <h1 class="blogs-card-content__header">Events and conferences</h1>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Comments:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Participants:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blogs-detailed-results__btn">view</a>
            </div>
            <div class="blogs-detailed-results__card responsive">
                <div class="blogs-detailed-results__pic-box">
                    <img src="img/education.svg" alt="blogs pic" class="blogs-detailed-results__pic responsive-pic" />
                </div>
                <div class="blogs-card-content">
                    <h1 class="blogs-card-content__header">Events and conferences</h1>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Comments:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Participants:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blogs-detailed-results__btn">view</a>
            </div>
            <div class="blogs-detailed-results__card responsive">
                <div class="blogs-detailed-results__pic-box">
                    <img src="img/education.svg" alt="blogs pic" class="blogs-detailed-results__pic responsive-pic" />
                </div>
                <div class="blogs-card-content">
                    <h1 class="blogs-card-content__header">Events and conferences</h1>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Comments:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blogs-card-content-info">
                        <p class="blogs-card-content__subtitle">Participants:</p>
                        <p class="blogs-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blogs-detailed-results__btn">view</a>
            </div>
        </div>
    </div>
</div>

@endsection

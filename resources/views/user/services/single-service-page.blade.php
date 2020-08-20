@extends('user.layouts.fixed_layout')
@section('content')

<div class="service-summary">
    <div class="service-summary__info">
        <div class="service-summary__details">
            <h1 class="service-summary__details-header">{{$service->title_en}}</h1>
            <p class="service-summary__details-brief">
                {{$service->description_en}}
            </p>
            <p class="service-summary__details-quick-summary">
                {{$service->content_en}}
            </p>
            <div class="service-summary__details-comments">
                <h1 class="comments">No. of buyers:</h1>
                <p class="comments__values">68756</p>
            </div>
            <div class="service-summary__details-views">
                <h1 class="views">price:</h1>
                <p class="views__values">{{$service->price}}</p>
            </div>
            <div class="service-summary__details-rate">
                <h1 class="rate">Rate:</h1>
                <img src="{{asset('img/star-rating.svg')}}" alt="star" class="rate-star" />
            </div>
        </div>
        <div class="service-summary__picutre-box">
            <div class="service-summary__favourite">
                <div class="service-summary__favourite-icon-box">
                    {{!$favourite = App\Favouriteservice::where('user_id', '=', Auth::user()->id)->where('service_id', '=', $service->id)->get()}};


                    <i data-serviceid="{{$service->id}}" class="fas fa-heart fa-2x  add-fav {{$favourite->count()>0?'red':''}}"></i>
                </div>
                <h1 class="service-summary__favourite-word">add to Favourite</h1>
            </div>
            <img src="{{asset('storage/'.$service->picture)}}" alt="single post pic" class="service-summary__picture" style="width:582px;height:490px;border-radius: 20px;" />
        </div>
    </div>
</div>
<div class="service-details">
    <div class="service-details__content-box">
        <h1 class="service-details__header">Content</h1>
        <p class="service-details__paragraph">
            {{$service->content_en}}
        </p>
        <div class="service">
            <div class="service__left-panel">
                <div class="service__options">
                    <ul class="options__list">
                        <li class="options__items">
                            <a href="#" class="options__item">Ask about the service</a>
                        </li>
                        <hr />
                        <li class="options__items">
                            <a href="#" class="options__item">Report a problem</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="service__fav-btn">
                    <img src="{{asset('img/Icon awesome-heart.svg')}}" alt="fav" class="fav-icon" />
                    Favourties
                </a>
                <a href="#" class="service__share-btn">
                    <img src="{{asset('img/share-icon.svg')}}" alt="share" class="share-icon" />
                    Share
                </a>
            </div>
            <div class="service__right-panel">
                <div class="payment-section">
                    <h1 class="service__right-panel-title">Get the service</h1>
                    <div class="bottom-line"></div>
                    <form action="#" class="service__payment">
                        <label for="name" class="name-label">Name on the card</label>
                        <input type="text" id="name" name="name" placeholder="Your name.." class="name-input" />
                        <label for="card-number" class="name-label">Card number</label>
                        <input type="text" id="card-number" name="lastname" placeholder="4242 4242 4242 4242" class="name-input" />
                        <div class="extra-card-info">
                            <div class="extra-card-info__expiry">
                                <label for="exp" class="small-labels">expiry date</label>
                                <input type="text" id="exp" name="firstname" placeholder="Your name.." class="small-inputs" />
                            </div>
                            <div class="extra-card-info__cvc">
                                <label for="cvc" class="small-labels">CVC</label>
                                <input type="text" id="cvc" name="lastname" placeholder="4242 4242 4242 4242" class="small-inputs" />
                            </div>
                        </div>
                        <button class="payment-submit-btn">Get the service</button>
                    </form>
                </div>
                <div class="payment-illustration-box">
                    <img src="{{asset('img/payment-illustration.svg')}}" alt="" class="payment-illustration" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
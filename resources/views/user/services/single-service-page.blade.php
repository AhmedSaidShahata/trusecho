@extends('user.layouts.fixed_layout')
@section('content')

{{!$lang=LaravelLocalization::getCurrentLocale()}}

@section('payment-style')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection

<div class="service-summary">
    @if(session()->has('success_ar') OR session()->has('success_en') )
    <div class="alert alert-success">
        {{ $lang == 'ar' ? session()->get('success_ar')   :  session()->get('success_en') }}

    </div>
    @endif


    @if(session()->has('error_ar') OR session()->has('error_en') )
    <div class="alert alert-danger">
        {{ $lang == 'ar' ? session()->get('error_ar')   :  session()->get('error_en') }}

    </div>
    @endif




    <div class="service-summary__info">
        <div class="service-summary__details">
            <h1 class="service-summary__details-header">{{$service->title }}</h1>
            <p class="service-summary__details-brief">
                {{$service->description }}
            </p>
            <p class="service-summary__details-quick-summary">
                {{$service->content }}
            </p>
            <div class="service-summary__details-comments">
                <h1 class="comments">{{__('messages.num_buy')}}:</h1>
                <p style="font-size:20px">{{$number_of_buyers}}</p>
            </div>
            <div class="service-summary__details-views">
                <h1 class="views">{{__('messages.price')}}:</h1>
                <p class="views__values">{{$service->price}}</p>
                <span hidden class="ser-id">{{$service->id}}</span>
            </div>


            <div class="service-summary__details-rate">
                <h1 class="rate">{{__('messages.rate')}}:</h1>
                <div>
                    <div hidden> {{!$count_rate_of_ser=App\Rateser::where('ser_id', '=', $service->id)->get()->count()}}</div> @if($count_rate_of_ser==0) @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far fa-star rate-ser fa-2x"></i>

                        @endfor

                        @else

                        {{!$sum_values_rate = App\Rateser::where('ser_id', '=', $service->id)->get()->avg('value_rate')}}

                        {{!$decimal_total_rate = substr($sum_values_rate, 0, 3)}}

                        {{!$integer_total_rate = substr($sum_values_rate, 0, 1)}}

                        <div hidden>
                            {{!$is_desimal = $decimal_total_rate - $integer_total_rate}}
                        </div>

                        @for ($i = 1; $i <= $integer_total_rate; $i++) <i data-value="{{$i}}" class="fas fa-star rate-ser fa-2x"></i>

                            @endfor

                            @if ($is_desimal >= .3 && $is_desimal <= 8) <i data-value="{{$i}}" class="fas fa-star-half-alt rate-ser fa-2x"></i>

                                @for ($i = $integer_total_rate + 2; $i <= 5; $i++) <i data-value="{{$i}}" class="far fa-star rate-ser fa-2x"></i>
                                    @endfor

                                    @else

                                    @for ($i = $integer_total_rate + 1; $i <= 5; $i++) <i data-value={{$i}} class="far fa-star rate-ser fa-2x"></i>

                                        @endfor


                                        @endif




                                        @endif

                </div>

            </div>
        </div>
        <div class="service-summary__picutre-box" style="padding:0 20px ">
            @auth
            <div class="service-summary__favourite">
                <div class="service-summary__favourite-icon-box">
                    {{!$favourite = App\Favouriteservice::where('user_id', '=', Auth::user()->id)->where('service_id', '=', $service->id)->get()}}

                    <i data-serviceid="{{$service->id}}" class="fas fa-heart fa-2x  add-fav {{$favourite->count()>0?'red':''}}"></i>
                </div>
                <h1 class="service-summary__favourite-word">{{__('messages.add_fav')}}</h1>
            </div>
            @endauth

            @guest
            <div class="service-summary__favourite">
                <div class="service-summary__favourite-icon-box">

                    <i  class="fas fa-heart fa-2x "></i>
                </div>
                <h1 class="service-summary__favourite-word">{{__('messages.add_fav')}}</h1>
            </div>
            @endguest
            <img src="{{asset('storage/'.$service->picture)}}" alt="single post pic" class="service-summary__picture" style="width:582px;height:490px;border-radius: 20px;" />
        </div>
    </div>
</div>
<div class="service-details">
    <div class="service-details__content-box" style="padding: 26px;">
        <h1 class="service-details__header">{{__('messages.description') }}</h1>
        <p class="service-details__paragraph">
            {{$service->content }}
        </p>
        <div class="service">
            <div class="service__left-panel">
                <div class="service__options">
                    <ul class="options__list">
                        <li class="options__items">
                            @auth
                            <a href="{{route('user.contacts.index')}}" class="options__item">{{__('messages.ask_ser')}}</a>
                            @endauth

                            @guest
                            <a href="{{route('login')}}" class="options__item">{{__('messages.ask_ser')}}</a>
                            @endguest
                        </li>
                        <hr />
                        <li class="options__items">
                            @auth
                            <a href="#report-the-service" class="options__item">{{__('messages.report')}}</a>
                            @endauth
                            @guest
                            <a href="{{route('login')}}" class="options__item">{{__('messages.report')}}</a>
                            @endguest
                        </li>
                    </ul>
                </div>
                <a href="#" class="service__fav-btn">
                    <img src="{{asset('img/Icon awesome-heart.svg')}}" alt="fav" class="fav-icon" />
                    {{__('messages.fav')}}
                </a>
                <a href="#" class="service__share-btn">
                    <img src="{{asset('img/share-icon.svg')}}" alt="share" class="share-icon" />
                    {{__('messages.share')}}
                </a>
            </div>
            <div class="service__right-panel">
                <div class="payment-section">
                    <h1 class="service__right-panel-title">{{__('messages.get_ser')}}</h1>
                    <div class="bottom-line"></div>



                    <form class="service__payment" action="{{route('user.checkout')}}" method="post" id="payment-form">
                        @csrf()
                        <label for="name" class="name-label">{{__('messages.name_card')}}</label>
                        @auth
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        @endauth
                        <input type="hidden" name="service_id" value="{{$service->id}}">
                        <input type="text" id="name" name="name_on_card" placeholder="{{__('messages.name_card')}}.." class="name-input" />
                        <label for="card-number" class="name-label">{{__('messages.card_num')}}</label>

                        <div class="card-body">
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            <input type="hidden" name="plan" value="" />
                        </div>

                        <div class="extra-card-info">
                            <div class="extra-card-info__expiry">
                                <label for="exp" class="small-labels">{{__('messages.expire')}}</label>
                                <input style="font-size: 14px;" type="date" id="exp" name="date_expire" placeholder="{{__('messages.expire')}}..." class="small-inputs" />
                            </div>
                            <div class="extra-card-info__cvc">
                                <label for="cvc" class="small-labels">CVC</label>
                                <input style="font-size: 14px;" type="text" id="cvc" name="cvc" placeholder="4242 4242 4242 4242" class="small-inputs" />
                            </div>
                        </div>
                        @auth
                        <button class="payment-submit-btn">{{__('messages.get_ser')}}</button>
                        @endauth
                        @guest
                        <a href="{{route('login')}}" class="payment-submit-btn">{{__('messages.get_ser')}}</a>
                        @endguest
                    </form>
                </div>
                <div class="payment-illustration-box">
                    <img src="{{asset('img/payment-illustration.svg')}}" alt="" class="payment-illustration" />
                </div>
            </div>
        </div>
    </div>
</div>


<div class="popup" id="report-the-service">
    <form action="{{route('user.reportservices.store')}}" method="post" enctype="multipart/form-data">
        <div class="popup__content">
            <div class="popup__left">
                <h1 class="popup__header">{{__('messages.report_service')}}</h1>
                <div class="header__underline"></div>
                <input type="hidden" name="seen" value="0">
                @auth
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                @endauth
                <input type="hidden" name="service_id" value="{{$service->id}}">

                @csrf
                <!-- class="add-cv-input" -->
                <h3 class="add-cv__title" style="font-size: 20px; color:black">{{__('messages.report_service')}}</h3>


                <div class="applying-for-job-illustration-box">
                    <img src="{{asset('img/applying-for-a-job.svg')}}" alt="apply for job" class="applying-for-job-illustration" />
                </div>
            </div>
            <div class="popup__right">
                <a href="#tours_section" class="popup__closing">×</a>

                <div class="input">
                    <label for="message" class="popup__label-style">{{__('messages.description_report')}}</label>
                    <textarea id="message" name="description" rows="3" cols="60" class="input-message" placeholder="{{__('messages.message')}}...."></textarea>
                </div>

                <button class="input-btn" type="submit">{{__('messages.submit')}}</button>

            </div>
        </div>
    </form>
</div>



@endsection

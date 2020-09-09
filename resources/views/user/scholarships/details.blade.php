@extends('user.layouts.fixed_layout')
@section('content')
{{!$lang='_'.LaravelLocalization::getCurrentLocale()}}
<div class="organization-cover-pic-box">
    <img  src="{{asset('storage/'.$scholarship->picture) }}" alt="org cover pic" class="organization-cover-pic" style="height: 300px; width:100%" />
    <div class="organization-profile-info-box">
        <!-- <div class="organization-profile-pic-box">
            <img src="" alt="Company Logo" class="organization-profile-pic" />
        </div> -->
        <!-- <div class="organization-info">
            <h1 class="organization-name">CARGOMATIC INC.</h1>
            <div class="followers-box">
                <p class="followers-title">followers:</p>
                <p class="followers-value">956,384</p>
            </div>
        </div> -->
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
        <a href="{{route('user.appscholars.show',$scholarship->id)}}" class="orgs-job-apply-btn">{{__('messages.apply_now')}}</a>
    </div>
    <div class="right-panel">
        <h1 class="right-panel__header">
            {{$scholarship->{'heading_details'.$lang} }}
        </h1>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.location')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$scholarship->{'location'.$lang} }}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.publish_date')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$scholarship->created_at}}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.deadline')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$scholarship->deadline}}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.number_app')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">0</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.email')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$scholarship->email}}</p>
        </div>
        <p class="right-panel__description">
            {{$scholarship->content}}
        </p>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.rate_scholar')}}:</p>
            </div>
            <div class="right-panel__subtitle-value">
               <div hidden> {{!$count_rate_of_scholar=App\Scholarshiprate::where('scholarship_id', '=', $scholarship->id)->get()->count()}}</div>

                @if($count_rate_of_scholar ==0)

                @for($i=1; $i<=5; $i++) <i data-value="{{$i}}" class="far rate-scholar fa-star fa-2x rate-scholar"></i>

                    @endfor

                    @else

                    {{!$sum_values_rate = App\Scholarshiprate::where('scholarship_id', '=', $scholarship->id)->get()->avg('value_rate')}}

                    {{!$decimal_total_rate = substr($sum_values_rate, 0, 3)}}

                    {{!$integer_total_rate = substr($sum_values_rate, 0, 1)}}

                    <div hidden>
                        {{!$is_desimal = $decimal_total_rate - $integer_total_rate}}
                    </div>

                    @for ($i = 1; $i <= $integer_total_rate; $i++) <i data-value="{{$i}}" class="fas rate-scholar fa-star fa-2x"></i>

                        @endfor

                        @if ($is_desimal >= .3 && $is_desimal <= 8) <i data-value="{{$i}}" class="fas rate-scholar fa-star-half-alt fa-2x"></i>

                            @for ($i = $integer_total_rate + 2; $i <= 5; $i++) <i data-value="{{$i}}" class="far rate-scholar fa-star fa-2x"></i>
                                @endfor

                                @else

                                @for ($i = $integer_total_rate + 1; $i <= 5; $i++) <i data-value={{$i}} class="far rate-scholar fa-star fa-2x"></i>

                                    @endfor


                                    @endif

                                    <div class="rate_div"> total rated is <span class="rate_numbers"> {{ $decimal_total_rate }}</span> from <span class="rate_numbers"> {{$count_rate_of_scholar }}</span> Users </div>


                                    @endif

            </div>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.scholar_require')}}:</p>
            </div>
        </div>
        <ul class="right-panel__job-requirements-list">
            <?php $requirments_exp = explode("-", $scholarship->{'requirements'.$lang}) ?>
            @foreach($requirments_exp as $requirment)
            <li class="right-panel__job-requirements-item">
                {{$requirment}}
            </li>
            @endforeach

        </ul>
        <div class="job-comments">
            <div class="job-comments__content-box">
                <div class="job-comments__header">
                    <span class="job-comments__word">{{__('messages.comments')}}</span>
                    <hr class="horizontal-line" />
                </div>
                <div class="job-comments__send-box">
                    <textarea id="blog-comment" cols="30" rows="7" class="job-comments__content comment-scholar" placeholder="{{__('messages.placeholder_comment_scholar')}}"></textarea>
                    <a type="button" class="job-comments__send-icon add-comment-scholar" method="POST">
                        <img src="{{asset('img/Send blue icon.png')}}" alt="send " class="send-icon" />
                    </a>
                </div>
                <div class="job-comments__reviews">
                    @auth
                    <span hidden class="commentor-id">{{ Auth::user()->id }}</span>
                    <span hidden class="commentor-name">{{ Auth::user()->name }}</span>
                    <span hidden class="commentor-image">{{Auth::user()->profile->picture}}</span>
                    <span hidden class="scholar-id">{{$scholarship->id}}</span>
                    @endauth
                    <div class="user-job-comment">
                        <div class="user-job-pic-box">
                            <img src="{{asset('img/user-comment-pic.png')}}" alt="user pic" class="user-job-pic" />
                        </div>
                        <div class="user-job-details">
                            <h1 class="user-job-name">Taylor Adams</h1>
                            <p class="user-job-comment-paragraph">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Iste in beatae praesentium dolores porro, nobis labore ut
                                omnis, nam temporibus neque inventore culpa dolore
                                reiciendis molestias optio libero? Velit debitis eligendi
                                necessitatibus enim ratione cupiditate, veritatis facere?
                                Sapiente iure quos tempora quasi quo fugit suscipit
                                consequuntur qui neque dolorem voluptate temporibus, fugiat
                                provident corporis delectus. Explicabo magnam culpa amet
                                modi facere exercitationem deleniti fugit ab minima
                                reiciendis numquam rerum officiis, nemo dolorem natus ipsa!
                                Repudiandae, veniam? Eligendi molestias debitis culpa iure
                                harum, esse id qui fuga reiciendis nobis dolorem repellat
                                perspiciatis neque amet vero itaque odit ipsum dolores
                                eveniet accusamus.
                            </p>
                        </div>
                    </div>
                    <hr>


                    @foreach($comment_scholarships as $comment_scholarship)
                    <div class="user-job-comment">
                        <div class="user-job-pic-box">
                            <img src="{{asset('storage/'.$comment_scholarship->user->profile->picture)}}" alt="user pic" class="user-job-pic" />
                        </div>
                        <div class="user-job-details">
                            <h1 class="user-job-name">{{$comment_scholarship->user->name }}</h1>
                            <p class="user-job-comment-paragraph">
                                {{$comment_scholarship->body}}
                            </p>
                        </div>
                    </div>
                    <hr>
                    @endforeach

                    <hr />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

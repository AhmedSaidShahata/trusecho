@extends('user.layouts.fixed_layout')
@section('content')
<div class="organization-cover-pic-box">
    <img src="{{asset('storage/'.$opportunity->picture)}}" alt="org cover pic" class="organization-cover-pic" style="width: 100%; height:300px" />
    <!-- <div class="organization-profile-info-box">
        <div class="organization-profile-pic-box">
            <img src="" alt="Company Logo" class="organization-profile-pic" />
        </div>
        <div class="organization-info">
            <h1 class="organization-name">CARGOMATIC INC.</h1>
            <div class="followers-box">
                <p class="followers-title">followers:</p>
                <p class="followers-value">956,384</p>
            </div>
        </div>
    </div> -->
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
    <div class="right-panel">
        <h1 class="right-panel__header">
            {{$opportunity->heading_details}}
        </h1>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.location')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$opportunity->location}}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.publish_date')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$opportunity->created_at}}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.deadline')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$opportunity->deadline}}</p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.number_app')}}:</p>
            </div>
            <div hidden>{{!$application_count = App\Jobapp::where('job_id', '=', $opportunity->id)->get()->count()}}</div>
            <p class="right-panel__subtitle-value">
                {{$application_count}}
            </p>
        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.email')}}:</p>
            </div>
            <p class="right-panel__subtitle-value">{{$opportunity->email}}</p>
        </div>
        <p class="right-panel__description">
            {{$opportunity->content}}
        </p>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.rate_opportunity')}}</p>
            </div>

        </div>
        <div class="right-panel__details-box">
            <div class="right-panel__subtitle-box">
                <p class="right-panel__subtitle">{{__('messages.requirments')}}:</p>
            </div>
        </div>
        <ul class="right-panel__job-requirements-list">
            <?php $requirments_exp = explode("-", $opportunity->requirments) ?>
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
                    <span hidden class="job-id">{{$opportunity->id}}</span>
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




                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup" id="apply-for-job">
    <div class="popup__content">
        <div class="popup__left">
            <h1 class="popup__header">{{__('messages.apply_now')}}</h1>
            <div class="header__underline"></div>
            <form action="{{route('user.jobapps.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- class="add-cv-input" -->
                <input type="file" id="" name="cv" placeholder="none" />
                <!-- <div class="add-cv">
                    <div class="add-cv__title-box">
                        <img src="img/adding icon.svg" alt="add icon" class="add-cv-icon" />
                        <h3 class="add-cv__title">add a cv</h3>
                    </div>
                </div> -->

                <div class="applying-for-job-illustration-box">
                    <img src="{{asset('img/applying-for-a-job.svg')}}" alt="apply for job" class="applying-for-job-illustration" />
                </div>
        </div>
        <div class="popup__right">
            <a href="#tours_section" class="popup__closing">×</a>

            <div class="input">
                <label for="fullname" class="popup__label-style">Full Name</label>
                <input type="text" id="fullname" name="fullname" class="popup__input-style" placeholder="Full Name..." />
            </div>
            <div class="input">
                <label for="email" class="popup__label-style">Email</label>
                <input type="email" id="email" name="email" class="popup__input-style" placeholder="Email..." />
            </div>
            <div class="input">
                <label for="phone" class="popup__label-style">Phone Number</label>
                <input type="text" id="phone-number" name="phone" class="popup__input-style" placeholder="Phone Number..." />
            </div>
            <div class="input">
                <label for="message" class="popup__label-style">Message</label>
                <textarea id="message" name="message" rows="3" cols="60" class="input-message" placeholder="Your message ...."></textarea>
            </div>
            <input type="hidden" value="{{$opportunity->id}}" name="job_id">
            <button class="input-btn" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

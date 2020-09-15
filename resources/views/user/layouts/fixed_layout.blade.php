<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{Auth::check() ? Auth::user()->id : 'null' }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Truescho - Shape Your Dreams</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link rel="stylesheet" href="/css/{{LaravelLocalization::getCurrentLocale()}}-style.css" />
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <!-- POPPINS FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f52b54ca2d54400112ddf54&product=inline-share-buttons"></script>


</head>

<body>
    <div id="app">
        <span hidden class="lang">{{$lang='_'.LaravelLocalization::getCurrentLocale()}}</span>
        <span hidden class="my_lang">{{'/'.LaravelLocalization::getCurrentLocale()}}</span>
        <div class="navigation" id="navbar">
            <div class="navigation__logo-box">
                <img src="{{asset('img/2.png')}}" alt="Logo" class="nav-bar__logo" />
            </div>
            <div class="nav-bar">
                <ul class="nav-bar__list">
                    <li class="nav-bar__item">
                        <a href="{{route('user.homepages.index')}}" class="nav-bar__item-nav">{{__('messages.home')}}</a>
                    </li>
                    <!-- <li class="nav-bar__item">
                    <a href="{{route('user.friends.index')}}" class="nav-bar__item-nav">Users</a>
                </li> -->
                    @auth
                    <li class="nav-bar__item">
                        <a href="{{route('user.friends.index')}}" class="nav-bar__item-nav">{{__('messages.network')}}</a>
                    </li>
                    @endauth
                    <li class="nav-bar__item dropdown">
                        <a href="{{route('user.jobs.index')}}" class="nav-bar__item-nav dropbtn">{{__('messages.jobs')}}</a>
                        <div class="dropdown-content">
                            <!-- <a href="#">All Jobs</a>
                        <a href="#">Engineering</a>
                        <a href="#">Information Technology</a>
                        <a href="#">Media, TV, and Jounrals</a>
                        <a href="#">Future Jobs</a>
                        <a href="#">Education Sector</a> -->
                        </div>
                    </li>
                    <li class="nav-bar__item dropdown">
                        <a href="{{route('user.services.index')}}" class="nav-bar__item-nav dropbtn">{{__('messages.services')}}</a>
                        <div class="dropdown-content">
                            <!-- <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a> -->
                        </div>
                    </li>
                    <li class="nav-bar__item">
                        <a href="{{route('user.organizations.index')}}" class="nav-bar__item-nav">{{__('messages.organizations')}}</a>
                    </li>
                    <!-- <li class="nav-bar__item">
                    <a href="{{route('user.faqs.index')}}" class="nav-bar__item-nav">Faq</a>
                </li> -->
                    <li class="nav-bar__item dropdown">
                        <a href="{{route('user.opportunitys.index')}}" class="nav-bar__item-nav dropbtn">{{__('messages.opportunities')}}</a>
                        <div class="dropdown-content">
                            {{!$opportunities=App\Opportunity::all()}}
                            @forelse($opportunities as $opportunity)
                            <a href="{{route('user.opportunitys.show',$opportunity->id)}}">{{$opportunity->title_en}}</a>
                            @empty

                            @endforelse
                        </div>
                    </li>



                    @guest

                    @if (Route::has('register'))
                    <li class="nav-bar__item ">
                        <a class="nav-bar__item-nav nav-btn" href="{{ route('register') }}">{{ __('messages.sign_up') }}</a>
                    </li>
                    @endif
                    <li class="nav-bar__item ">
                        <a class="nav-bar__item-nav" href="{{ route('login') }} ">{{ __('messages.login') }}</a>
                    </li>
                    @else
                    <li class="nav-bar__item dropdown">
                        <div class="messages-icon-box">
                            <a href="/chat"> <img src="{{asset('img/messages-icon.svg')}}" alt="messages" class="messages-icon" /> </a>

                            <!-- <span class="messages-number">3</span> -->
                            <div class="dropdown-content">

                            </div>
                        </div>
                    </li>

                    <li class="nav-bar__item dropdown notify_app">
                        <div class="notification-icon-box">
                            <img src="{{asset('img/notification-icon.svg')}}" alt="notification" class="notification-icon" />
                            <span class="notification-number ">{{count(auth()->user()->unreadNotifications)}}</span>
                            <div class="dropdown-content ">
                                <notification :notifications="notifications">

                                </notification>
                            </div>
                        </div>
                    </li>

                    <li class="nav-bar__item dropdown">
                        <div class="notification-icon-box">
                            <i class="fas fa-user-friends fa-2x"></i>
                            <!-- <span class="notification-number">3</span> -->
                            <div class="dropdown-content">
                                <!-- <a href="#">Faisl just posted a blog</a>
                            <a href="#">Memo just added a job role</a>
                            <a href="#">Lily reacted to your post</a> -->
                                {{!$friends_request=App\Friend::where(['friend_id'=> Auth::user()->id,'accept'=>0])->get()}}

                                @forelse($friends_request as $friend_request )
                                {{!$user_request= $friend_request->user_id}}
                                {{!$friend=App\User::where(['id'=>$user_request])->get()->first()}}
                                {{!$friend_profile=App\Profile::where(['user_id'=>$user_request])->get()->first()}}
                                <span class="friend_id" hidden>{{$user_request}}</span>
                                <div class="requset-friend">
                                    <img src="{{asset('storage/'.$friend_profile->picture)}}" alt="friend image{{$friend->name}}" style="width: 60px; height:60px; float:left">

                                    <a href="{{route('user.friends.show',$user_request)}}" style="float: left;">
                                        {{$friend->name}}
                                    </a>
                                    <a style="clear:both;">
                                        <button data-friend="{{$friend->id}}" class="accept">{{ __('messages.accept') }}</button>
                                        <button data-friend="{{$friend->id}}" class="delete">{{ __('messages.delete') }}</button>
                                    </a>
                                </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                    </li>

                    <li class="nav-bar__item user-info dropdown">
                        <div class="user-pic-box">
                            <img style="width:70px;height:70px;border-radius: 50%;" src="{{asset('storage/'.Auth::user()->profile->picture)}}" alt="user pic" class="user-pic" />
                        </div>
                        <div class="user-info__name dropbtn"> {{ Auth::user()->name }}</div>
                        <div class="dropdown-content u-absolute-top">

                            <a class="dropdown-item" href="{{route('user.users.edit',  Auth::user()->id )}}">
                                {{__('messages.profile')}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('messages.log_out') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>


                            @endguest

                    <li class="nav-bar__item">
                        <ul style="list-style: none; font-size:20px;">
                            {{!$lang=LaravelLocalization::getCurrentLocale()}}
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="{{ $localeCode == $lang ? 'hidden' : '' }}">

                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $localeCode }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>


            @auth
            <div class="responsive-nav-icons">
                <ul class="responsive-nav-icons__list">
                    <li class="responsive-nav-icons__list-item">
                        <div class="messages-icon-box">
                            <a href="/chat"> <img src="{{asset('img/messages-icon.svg')}}" alt="messages" class="messages-icon" /> </a>
                            <!-- <span class="messages-number">1</span> -->
                        </div>
                    </li>
                    <li class="responsive-nav-icons__list-item">
                        <div class="notification-icon-box">
                            <img src="{{asset('img/notification-icon.svg')}}" alt="notification" class="notification-icon" />
                            <!-- <span class="notification-number"></span> -->
                        </div>
                    </li>
                    <li class="responsive-nav-icons__list-item">
                        <div class="user-pic-box">
                            <a href="{{route('user.users.edit',  Auth::user()->id )}}"><img src="{{asset('storage/'.Auth::user()->profile->picture)}}" alt="user pic" class="user-pic" style="width:70px;height:70px;border-radius: 50%;" /></a>
                        </div>
                    </li>
                </ul>
            </div>

            @endauth
            <!-- Burger Side bar -->
            <nav role="responsive-navigation">
                <div id="menuToggle">
                    <!--
  A fake / hidden checkbox is used as click reciever,
  so you can use the :checked selector on it.
  -->
                    <input type="checkbox" />

                    <!--
  Some spans to act as a hamburger.

  They are acting like a real hamburger,
  not that McDonalds stuff.
  -->
                    <span></span>
                    <span></span>
                    <span></span>

                    <!--
  Too bad the menu has to be inside of the button
  but hey, it's pure CSS magic.
  -->





                    <ul id="menu">

                        <a href="{{route('user.homepages.index')}}">
                            <li>{{__('messages.home')}}</li>
                        </a>
                        @auth
                        <a href="{{route('user.friends.index')}}">
                            <li>{{__('messages.network')}}</li>
                        </a>
                        @endauth
                        <a href="{{route('user.organizations.index')}}">
                            <li>{{__('messages.organizations')}}</li>
                        </a>
                        <a href="{{route('user.jobs.index')}}">
                            <li>{{__('messages.jobs')}}</li>
                        </a>
                        <a href="opportunities-signed.html">
                            <li>{{__('messages.opportunities')}}</li>
                        </a>
                        <a href="{{route('user.services.index')}}">
                            <li>{{__('messages.services')}}</li>
                        </a>
                        @auth
                        <a href="{{route('user.users.edit',  Auth::user()->id )}}">
                            <li>{{__('messages.profile')}}</li>
                        </a>

                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <li> {{ __('messages.log_out') }} </li>
                        </a>
                        @endauth


                    </ul>
                </div>
            </nav>
        </div>

        <div>
            <main class="py-5">
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="footer">
        <div class="footer__content-box">
            <div class="footer__left">
                <img src="{{asset('img/truescho-logo-new-version.png')}}" alt="new logo" class="footer__left-logo">
                <div class="footer__left-social">
                    <a href="#" class=" footer__left-social-icon">
                        <img src="{{asset('img/facebook.png')}}" alt="fb-icon" class="sm-icon">
                    </a>
                    <a href="#" class="footer__left-social-icon">
                        <img src="{{asset('img/twitter.png')}}" alt="twitter-icon" class="sm-icon">
                    </a>
                    <a href="#" class="footer__left-social-icon">
                        <img src="{{asset('img/instagram.png')}}" alt="instgram-icon" class="sm-icon">
                    </a>
                    <a href="#" class="footer__left-social-icon">
                        <img src="{{asset('img/linkedin.png')}}" alt="linkedin-icon" class="sm-icon">
                    </a>
                    <a href="#" class="footer__left-social-icon">
                        <img src="{{asset('img/telegram.png')}}" alt="telegram-icon" class="sm-icon">
                    </a>
                </div>
                <p class="footer__left-copywrites">{{__('messages.copyright')}}</p>
            </div>
            <div class="footer__right">
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.about_company')}}</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.important_links')}}</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.asked_question')}}</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="{{route('user.contacts.index')}}">{{__("messages.contact_us")}}</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.latest_posts')}}
                            </a> </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.add_exp')}}</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.promot_post')}}</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.volunter')}}</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.fav')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.terms')}}</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.policy')}}</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.blogs')}}</a>
                        </li>
                        <li class="footer__right-info-list-item"><a href="#">{{__('messages.privacy')}}</a></li>
                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.about_company')}}</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">{{__('messages.important_links')}}</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#"> {{__('messages.asked_question')}}</a>
                        </li>
                        <li class="footer__right-info-list-item"><a href="{{route('user.contacts.index')}}"> {{__('messages.contact_us')}}</a></li>
                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#" class="footer__title"> {{__('messages.all_jobs')}}</a>
                        </li>
                        <!-- <li class="footer__right-info-list-item sub-item">
                            <a href="#">Engineering</a>
                        </li> -->

                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#" class="footer__title"> {{__('messages.scholarships')}}</a>
                        </li>
                        <!-- <li class="footer__right-info-list-item sub-item">
                            <a href="#">Bachelor Scholarships</a>
                        </li> -->

                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            {{__('messages.get_app')}}
                        </li>
                        <li>
                            <img src="{{asset('img/google-play-download-android-app-logo-png-transparent.png')}}" alt="google play" class="app-store-pic">
                        </li>
                        <li>
                            <img src="{{asset('img/App Store.png')}}" alt="App Store" class="google-play-pic">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- DESIGN IN JS -->

    <!-- Go to www.addthis.com/dashboard to customize your tools -->

    <script src="{{ asset('js/app.js') }} "></script>

    <script>
        let preview;
        let previewScholar;
        $("input[type=file]").on("click", function() {
            preview = $(this).siblings("img")
            previewScholar = $(this).parent().siblings("img")
        })

        function showPreview(event) {
            if (event.target.files.length > 0) {
                let src = URL.createObjectURL(event.target.files[0]);
                preview.attr("src", src)
                previewScholar.attr("src", src)

            }
        }
    </script>

    <script>
        $(function() {

            // Start Image Upload


            // Start Notification

            $(".notify_app").hover(function() {
                $(this).children().find(".notification-number").text(0)
            })

            // $(".unread").foreach(function(){
            //         $(this).removeClass('unread')
            //     })

            //=========================================== Start Comment scholar With Ajax ===============================


            $(".add-comment-news").on("click", function() {
                let comment = $(this).parent().siblings('input');
                let commentNews = comment.val();
                let commentorName = $(".commentor-name").text();
                let commentorImage = $(".commentor-image").text();
                let newsId = $(this).data('newsid')

                let commentContainer = $(this).parents(".post").children(".comments-container")


                $.ajax({
                    url: myLang + "/newscomments",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        commentNews: commentNews,
                        newsId: newsId,

                    },
                    success: function(data) {
                        comment.val('')

                        commentContainer.append(`

                        <div class="post-comment">
                <div class="post-comment-pic-box">
                    <img src="{{asset('/storage/${commentorImage}')}}" alt="user pic" class="post-comment-pic" />
                </div>
                <div class="post-comment-details">
                    <h1 class="post-comment-name">${commentorName}</h1>
                    <p class="post-comment-paragraph">
                       ${commentNews}
                    </p>
                </div>
              </div>


                `)

                    }
                })


            })


            //=========================================== Start favourite With Ajax ===============================
            $(document).on("click", ".add-fav-scholar", function() {

                let reference = $(this);
                let scholarId = reference.data("scholarid");


                $.ajax({
                    url: myLang + "/favscholars",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        scholarId: scholarId,

                    },
                    success: function(data) {
                        reference.toggleClass("red")
                    }
                })
            })




            //=========================================== Start like News With Ajax ===============================
            $(document).on("click", ".like-news", function() {

                let reference = $(this);
                let newsId = reference.data("newsid");



                $.ajax({
                    url: myLang + "/newslike",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        newsId: newsId,

                    },
                    success: function(data) {
                        reference.toggleClass("blue")
                    }
                })
            })

            //=========================================== Start like scholar With Ajax ===============================
            $(document).on("click", ".like_scholar", function() {

                let reference = $(this);
                let scholarId = reference.data("scholarid");



                $.ajax({
                    url: myLang + "/likescholars",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        scholarId: scholarId,

                    },
                    success: function(data) {
                        reference.toggleClass("blue")
                    }
                })
            })




            let lang = $(".lang").text()
            let myLang = $(".my_lang").text()

            localStorage.setItem('lang', lang)


            //=========================================== Start rate blog With Ajax===============================

            $(document).on("click", ".rate_user .fa-star", function() {

                let reference = $(this);
                let value_rate = reference.data("value");

                let blog_id = reference.parent().attr('blog_id');
                let rateOutPut = "";


                for (var i = 1; i <= value_rate; i++) {

                    rateOutPut += `<i data-value="${i}" class="fas fa-star fa-2x"></i>`
                }

                for (var i = value_rate + 1; i <= 5; i++) {
                    rateOutPut += `<i data-value="${i}" class="far fa-star fa-2x"></i>`
                }

                $(".rate_user").html(rateOutPut)


                $.ajax({
                    url: myLang + "/rateblogs",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        value_rate: value_rate,
                        blog_id: blog_id
                    },
                    success: function(data) {

                        $(".rate-total").fadeOut(500).fadeIn(500)
                        setTimeout(() => {
                            $(".rate-total").html(data)
                        }, 500);


                    }
                })
            })

            //=========================================== Start add friend With Ajax===============================
            $(document).on("click", ".accept", function() {

                let reference = $(this);
                let friendId = reference.data('friend')


                $.ajax({
                    url: myLang + "/friendaccept",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        friendId: friendId,

                    },
                    success: function(data) {
                        reference.text('friends')
                    }
                })
            })

            //=========================================== Start add friend With Ajax===============================
            $(document).on("click", ".delete", function() {

                let reference = $(this);
                let friendId = reference.data('friend')


                $.ajax({
                    url: myLang + "/frienddelete",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        friendId: friendId,

                    },
                    success: function(data) {
                        reference.parents('.requset-friend').remove()
                    }
                })
            })



            //=========================================== Start add friend With Ajax===============================
            $(document).on("click", ".add-friend", function() {

                let reference = $(this);
                let userId = reference.data("userid");

                $.ajax({
                    url: myLang + "/friendrequest",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        userId: userId,

                    },
                    success: function(data) {
                        if (reference.text() == 'Add Friend') {
                            reference.text('Friend Request Sent')

                        } else {
                            reference.text('Add Friend');

                        }
                    }
                })
            })


            //============================================ Start follower Ajax======================


            $(document).on("click", ".add-follower", function() {

                let reference = $(this);

                let followCount = $(this).siblings(".best-organizations-section-signed__followers").children(".follow-count")
                let followCountVal = parseInt(followCount.text())


                let orgId = reference.data("orgid");

                $.ajax({
                    url: myLang + "/followerorgs",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        orgId: orgId,

                    },
                    success: function(data) {


                        if (reference.text() == ' follow ') {
                            reference.text(' following ')
                            followCount.text(followCountVal += 1)
                        } else if (reference.text() == ' متابعة ') {
                            reference.text(' تتابعه ')
                            followCount.text(followCountVal += 1)
                        } else if (reference.text() == ' تتابعه ') {

                            reference.text(' متابعة ')
                            followCount.text(followCountVal -= 1)
                        } else {
                            reference.text(' follow ');
                            followCount.text(followCountVal -= 1)
                        }

                    }
                })
            })

            //=========================================== Start Rate With Ajax===============================
            $(document).on("click", ".rate-org", function() {

                let reference = $(this);
                let valueRate = reference.data("value");
                let orgId = $(".org-id").text();

                $.ajax({
                    url: myLang + "/rateorgs",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        valueRate: valueRate,
                        orgId: orgId
                    },
                    success: function(data) {
                        reference.parent().html(data)
                    }
                })
            })

            //=========================================== Start Rate With Ajax===============================
            $(document).on("click", ".rate-job", function() {

                let reference = $(this);
                let valueRate = reference.data("value");
                let jobId = $(".job-id").text();

                $.ajax({
                    url: myLang + "/ratejobs",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        valueRate: valueRate,
                        jobId: jobId
                    },
                    success: function(data) {
                        reference.parent().html(data)
                    }
                })
            })


            //=========================================== Start Rate With Ajax===============================
            $(document).on("click", ".rate-ser", function() {

                let reference = $(this);
                let valueRate = reference.data("value");
                let serId = $(".ser-id").text();

                $.ajax({
                    url: myLang + "/ratesers",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        valueRate: valueRate,
                        serId: serId
                    },
                    success: function(data) {
                        reference.parent().html(data)
                    }
                })
            })


            //=========================================== Start Rate With Ajax===============================
            $(document).on("click", ".rate_user-scholar .fa-star", function() {

                let reference = $(this);
                let valueRate = reference.data("value");
                let scholarId = $(".scholar-id").text();


                let rateOutPut = "";


                for (var i = 1; i <= valueRate; i++) {

                    rateOutPut += `<i data-value="${i}" class="fas fa-star fa-2x"></i>`
                }

                for (var i = valueRate + 1; i <= 5; i++) {
                    rateOutPut += `<i data-value="${i}" class="far fa-star fa-2x"></i>`
                }

                $(".rate_user-scholar").html(rateOutPut)

                $.ajax({
                    url: myLang + "/scholarshiprates",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        valueRate: valueRate,
                        scholarId: scholarId
                    },
                    success: function(data) {

                        $(".rate-total-scholar").html(data)
                    }
                })
            })


            //=========================================== Start Comment scholar With Ajax ===============================


            $(".add-comment-scholar").on("click", function() {
                let comment = $(".comment-scholar");
                let commentScholar = comment.val();
                let commentorName = $(".commentor-name").text();
                let commentorImage = $(".commentor-image").text();
                let scholarId = $(".scholar-id").text();


                $.ajax({
                    url: myLang + "/scholarshipcomments",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        commentScholar: commentScholar,
                        scholarId: scholarId,

                    },
                    success: function(data) {
                        comment.val('')

                        $(".comments-section__reviews-scholar").append(`
                        <div class="user-comment">
                        <div class="user-pic-box">
                            <img src=/storage/${commentorImage} alt="user pic" class="user-job-pic" style="width:60px;height:60px" />
                        </div>
                        <div class="user-details">
                            <h1 class="user-name">${commentorName}</h1>
                            <p class="user-comment-paragraph">
                                ${commentScholar }
                            </p>
                        </div>
                    </div>
                    <hr />

                `)

                    }
                })


            })

            //=========================================== Start Comment job With Ajax ===============================


            $(".add-comment").on("click", function() {
                let comment = $(".comment-job");
                let commentJob = comment.val();
                let commentorName = $(".commentor-name").text();
                let commentorImage = $(".commentor-image").text();
                let jobId = $(".job-id").text();


                $.ajax({
                    url: myLang + "/commentjobs",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        commentJob: commentJob,
                        jobId: jobId,

                    },
                    success: function(data) {
                        comment.val('')


                        $(".job-comments__reviews").append(`
                <hr/>
                <div class="user-job-comment">
                        <div class="user-job-pic-box">
                            <img src=/storage/${commentorImage} alt="user pic" class="user-job-pic" />
                        </div>
                        <div class="user-job-details">
                            <h1 class="user-job-name">${commentorName}</h1>
                            <p class="user-job-comment-paragraph">
                                ${commentJob}
                            </p>
                        </div>
                    </div>


                `)

                    }
                })


            })

            //=========================================== Start Comment blog With Ajax ===============================

            let countCommentsBlog = $(".user-comment").length
            let comments__values = $(".comments__values")
            comments__values.text(countCommentsBlog)
            $(".add-comment-blog").on("click", function() {
                let commentBlog = $(".comment-blog");
                let commentBlogvalue = commentBlog.val();
                let commentorBlogName = $(".commentor-blog-name").text();
                let commentorBlogImage = $(".commentor-blog-image").text();
                let blogId = $(".blog-id").text();
                let countCommentsBlog = $(".user-comment").length
                comments__values.text(countCommentsBlog + 1)

                $.ajax({
                    url: myLang + "/blogcomments",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        commentBlogvalue: commentBlogvalue,
                        blogId: blogId,

                    },
                    success: function(data) {
                        commentBlog.val('')


                        $(".comments-section__reviews").append(`
                        <hr/>
                 <div class="user-comment">
                        <div class="user-pic-box">
                            <img src=/storage/${commentorBlogImage} alt="user pic" class="user-job-pic" style="width:60px;height:60px" />
                        </div>
                        <div class="user-details">
                            <h1 class="user-name">${commentorBlogName}</h1>
                            <p class="user-comment-paragraph">
                                ${commentBlogvalue}
                            </p>
                        </div>
                    </div>


                `)

                    }
                })


            })

            //=========================================== Start favourite With Ajax ===============================
            $(document).on("click", ".add-fav", function() {

                let reference = $(this);
                let serviceId = reference.data("serviceid");


                $.ajax({
                    url: myLang + "/favouritesers",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        serviceId: serviceId,

                    },
                    success: function(data) {
                        reference.toggleClass("red")
                    }
                })
            })






            //=========================================== Start favourite With Ajax ===============================
            $(document).on("click", ".add-fav-blog", function() {

                let reference = $(this);
                let blogId = reference.data("blogid");


                $.ajax({
                    url: myLang + "/favblogs",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        blogId: blogId,

                    },
                    success: function(data) {
                        reference.toggleClass("red")
                    }
                })
            })



            //=========================================== Start favourite With Ajax ===============================
            $(document).on("click", ".blog-like", function() {

                let reference = $(this);
                let blogId = reference.data("blogid");



                $.ajax({
                    url: myLang + "/likeblogs",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        blogId: blogId,

                    },
                    success: function(data) {
                        reference.toggleClass("blue")
                    }
                })
            })


            // scholarship application



            // Start Input

            $(".degree").on("click", function() {

                $(this).addClass("active-degree").siblings().removeClass("active-degree")
                $("input[name='degree']").val($(this).text())
                console.log($("input[name='degree']").val())
            })
            $(".accept-rules").on("click", function() {

                if ($(".continue").attr('disabled')) {
                    $(".continue").removeAttr("disabled")
                } else {
                    $(".continue").attr("disabled", "disabled")
                }
            })

            $(".degree").css("cursor", "pointer")
        })
    </script>



</body>

</html>

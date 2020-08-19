<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Truescho - Shape Your Dreams</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <!-- POPPINS FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>

<body>
    <div class="navigation" id="navbar">
        <div class="navigation__logo-box">
            <img src="{{asset('img/2.png')}}" alt="Logo" class="nav-bar__logo" />
        </div>
        <div class="nav-bar">
            <ul class="nav-bar__list">
                <li class="nav-bar__item">
                    <a href="home-page.html" class="nav-bar__item-nav">Home</a>
                </li>
                <li class="nav-bar__item">
                    <a href="my-network.html" class="nav-bar__item-nav">My network</a>
                </li>
                <li class="nav-bar__item dropdown">
                    <a href="jobs.html" class="nav-bar__item-nav dropbtn">Jobs</a>
                    <div class="dropdown-content">
                        <a href="#">All Jobs</a>
                        <a href="#">Engineering</a>
                        <a href="#">Information Technology</a>
                        <a href="#">Media, TV, and Jounrals</a>
                        <a href="#">Future Jobs</a>
                        <a href="#">Education Sector</a>
                    </div>
                </li>
                <li class="nav-bar__item dropdown">
                    <a href="services.html" class="nav-bar__item-nav dropbtn">Services</a>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </li>
                <li class="nav-bar__item">
                    <a href="organizations.html" class="nav-bar__item-nav">Organizations</a>
                </li>
                <li class="nav-bar__item">
                    <a href="{{route('user.faqs.index')}}" class="nav-bar__item-nav">Faq</a>
                </li>
                <li class="nav-bar__item dropdown">
                    <a href="organizations.html" class="nav-bar__item-nav dropbtn">Opportunities</a>
                    <div class="dropdown-content">
                        <a href="#">Bachelor scholarships</a>
                        <a href="#">Masters scholarships</a>
                        <a href="#">PHD scholarships</a>
                        <a href="#">Exchange Programs</a>
                        <a href="#">Job Offers</a>
                        <a href="#">Internships</a>
                        <a href="#">Volunteering Opportunities</a>
                        <a href="#">Workshops</a>
                        <a href="#">Courses</a>
                    </div>
                </li>



                @guest
                <li class="nav-bar__item ">
                    <a class="nav-bar__item-nav" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-bar__item ">
                    <a class="nav-bar__item-nav" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif

                @else
                <li class="nav-bar__item dropdown">
                    <div class="messages-icon-box">
                        <img src="{{asset('img/messages-icon.svg')}}" alt="messages" class="messages-icon" />
                        <span class="messages-number">3</span>
                        <div class="dropdown-content">
                            <a href="messages.html">Message from Mostafa</a>
                            <a href="messages.html">Message from Mahmoud</a>
                            <a href="messages.html">Message from Memo</a>
                        </div>
                    </div>
                </li>

                <li class="nav-bar__item dropdown">
                    <div class="notification-icon-box">
                        <img src="{{asset('img/notification-icon.svg')}}" alt="notification" class="notification-icon" />
                        <span class="notification-number">3</span>
                        <div class="dropdown-content">
                            <a href="#">Faisl just posted a blog</a>
                            <a href="#">Memo just added a job role</a>
                            <a href="#">Lily reacted to your post</a>
                        </div>
                    </div>
                </li>

                <li class="nav-bar__item user-info dropdown">
                    <div class="user-pic-box">
                        <img style="width:70px;height:70px;" src="{{asset('storage/'.Auth::user()->profile->picture)}}" alt="user pic" class="user-pic" />
                    </div>
                    <div class="user-info__name dropbtn"> {{ Auth::user()->name }}</div>
                    <div class="dropdown-content u-absolute-top">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <a class="dropdown-item" href="{{route('user.users.edit',  Auth::user()->id )}}">
                            Profile
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>


                        @endguest

                <li class="nav-bar__item">
                    <a href="#" class="nav-bar__item-nav">Ar</a>
                </li>
            </ul>
        </div>
        <div class="responsive-nav-icons">
            <ul class="responsive-nav-icons__list">
                <li class="responsive-nav-icons__list-item">
                    <div class="messages-icon-box">
                        <img src="{{asset('img/messages-icon.svg')}}" alt="messages" class="messages-icon" />
                        <span class="messages-number">1</span>
                    </div>
                </li>
                <li class="responsive-nav-icons__list-item">
                    <div class="notification-icon-box">
                        <img src="{{asset('img/notification-icon.svg')}}" alt="notification" class="notification-icon" />
                        <span class="notification-number">3</span>
                    </div>
                </li>
                <li class="responsive-nav-icons__list-item">
                    <div class="user-pic-box">
                        <a href="profile.html"><img src="{{asset('img/user-pic.png')}}" alt="user pic" class="user-pic" /></a>
                    </div>
                </li>
            </ul>
        </div>
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
                    <a href="home-page-signed.html">
                        <li>Home</li>
                    </a>
                    <a href="my-network-org.html">
                        <li>My network</li>
                    </a>
                    <a href="organizations-signed.html">
                        <li>Organizations</li>
                    </a>
                    <a href="jobs-signed.html">
                        <li>Jobs</li>
                    </a>
                    <a href="opportunities-signed.html">
                        <li>Opportunities</li>
                    </a>
                    <a href="services-signed.html">
                        <li>Services</li>
                    </a>
                    <a href="profile.html">
                        <li>Profile</li>
                    </a>
                    <a href="home-page.html">
                        <li>Log out</li>
                    </a>

                </ul>
            </div>
        </nav>
    </div>
    @yield('content')
    <footer class="footer">
        <div class="footer__content-box">
            <div class="footer__left">
                <img src="img/truescho-logo-new-version.png" alt="new logo" class="footer__left-logo">
                <div class="footer__left-social">
                    <a href="#" class=" footer__left-social-icon">
                        <img src="img/facebook.png" alt="fb-icon" class="sm-icon">
                    </a>
                    <a href="#" class="footer__left-social-icon">
                        <img src="img/twitter.png" alt="twitter-icon" class="sm-icon">
                    </a>
                    <a href="#" class="footer__left-social-icon">
                        <img src="img/instagram.png" alt="instgram-icon" class="sm-icon">
                    </a>
                    <a href="#" class="footer__left-social-icon">
                        <img src="img/linkedin.png" alt="linkedin-icon" class="sm-icon">
                    </a>
                    <a href="#" class="footer__left-social-icon">
                        <img src="img/telegram.png" alt="telegram-icon" class="sm-icon">
                    </a>
                </div>
                <p class="footer__left-copywrites">Copywrites &copy; reserved at Truescho</p>
            </div>
            <div class="footer__right">
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#">About the company</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">Important links</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">Frequently asked questions</a>
                        </li>
                        <li class="footer__right-info-list-item"><a href="{{route('user.contacts.index')}}">Contact us</a></li>
                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#">Latest Posts</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">Add an experience</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">Add a promoted post</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">Volunteer</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">Favourties</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#">Terms and conitions</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">Posting policy</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">Blogs</a>
                        </li>
                        <li class="footer__right-info-list-item"><a href="#">Privacy</a></li>
                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#">About the company</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">Important links</a>
                        </li>
                        <li class="footer__right-info-list-item">
                            <a href="#">Frequently asked questions</a>
                        </li>
                        <li class="footer__right-info-list-item"><a href="#">Contact us</a></li>
                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#" class="footer__title">All Jobs</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Engineering</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Information Technology</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Media, tv, and journals</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Future Jobs</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Education Sector</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Managment, business, and accounting</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">professional and techincal sector</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            <a href="#" class="footer__title">Scholarships</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Bachelor Scholarships</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Masters Scholarships</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">PHD Scholarships</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Job offers</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Internships</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Volunteering Opportunities</a>
                        </li>
                        <li class="footer__right-info-list-item sub-item">
                            <a href="#">Workshops Or Courses</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__right-info">
                    <ul class="footer__right-info-list">
                        <li class="footer__right-info-list-item">
                            get our app
                        </li>
                        <li>
                            <img src="img/google-play-download-android-app-logo-png-transparent.png" alt="google play" class="app-store-pic">
                        </li>
                        <li>
                            <img src="img/App Store.png" alt="App Store" class="google-play-pic">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- DESIGN IN JS -->

    <!-- Swiper JS -->

    <script>
        $(function() {



            //=========================================== Start Rate With Ajax===============================
            $(document).on("click", ".fa-star", function() {

                let reference = $(this);
                let valueRate = reference.data("value");
                let jobId = $(".job-id").text();

                $.ajax({
                    url: "/ratejobs",
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



            //=========================================== Start Comment With Ajax ===============================


            $(".add-comment").on("click", function() {
                let comment = $(".comment-job");
                let commentJob = comment.val();
                let commentorName = $(".commentor-name").text();
                let commentorImage = $(".commentor-image").text();
                let jobId = $(".job-id").text();


                $.ajax({
                    url: "/commentjobs",
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
                    <hr />

                `)

                    }
                })


            })

            //=========================================== Start favourite With Ajax ===============================
            $(document).on("click", ".add-fav", function() {

                let reference = $(this);
                let serviceId = reference.data("serviceid");



                $.ajax({
                    url: "/favouritesers",
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

        })
    </script>

    <!-- <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->

</body>

</html>

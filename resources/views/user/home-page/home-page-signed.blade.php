<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Truescho - Shape Your Dreams</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <!-- POPPINS FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="js/main.js" defer></script>
</head>

<body>
    <div class="navigation" id="navbar">
        <div class="navigation__logo-box">
            <img src="img/2.png" alt="Logo" class="nav-bar__logo" />
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
                        <img src="img/messages-icon.svg" alt="messages" class="messages-icon" />
                        <span class="messages-number">1</span>
                        <div class="dropdown-content">
                            <a href="messages.html">Message from Mostafa</a>
                            <a href="messages.html">Message from Mahmoud</a>
                            <a href="messages.html">Message from Memo</a>
                        </div>
                    </div>
                </li>

                <li class="nav-bar__item dropdown">
                    <div class="notification-icon-box">
                        <img src="img/notification-icon.svg" alt="notification" class="notification-icon" />
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
                        <img style="width:70px;height:70px;"  src="storage/{{ Auth::user()->profile->picture }}" alt="user pic" class="user-pic" />
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
                        <img src="img/messages-icon.svg" alt="messages" class="messages-icon" />
                        <span class="messages-number">1</span>
                    </div>
                </li>
                <li class="responsive-nav-icons__list-item">
                    <div class="notification-icon-box">
                        <img src="img/notification-icon.svg" alt="notification" class="notification-icon" />
                        <span class="notification-number">3</span>
                    </div>
                </li>
                <li class="responsive-nav-icons__list-item">
                    <div class="user-pic-box">
                        <a href="profile.html"><img src="img/user-pic.png" alt="user pic" class="user-pic" /></a>
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
    <div class="best-scolarships-section-signed">
        <h1 class="best-scolarships-section-signed__header">Best scholarships</h1>
        <div class="best-scolarships-section-signed__cards-info">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="best-scolarships-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-scolarships-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-scolarships-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-scolarships-section-signed__card-deadline-box">
                            <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                            <div class="deadline-number">
                                <h2 class="deadline-header">Hours:Days:Months</h2>
                                <h3 class="deadline-value">23:23:23</h3>
                            </div>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                    <div class="best-scolarships-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-scolarships-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-scolarships-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-scolarships-section-signed__card-deadline-box">
                            <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                            <div class="deadline-number">
                                <h2 class="deadline-header">Hours:Days:Months</h2>
                                <h3 class="deadline-value">23:23:23</h3>
                            </div>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                    <div class="best-scolarships-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-scolarships-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-scolarships-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-scolarships-section-signed__card-deadline-box">
                            <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                            <div class="deadline-number">
                                <h2 class="deadline-header">Hours:Days:Months</h2>
                                <h3 class="deadline-value">23:23:23</h3>
                            </div>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                    <div class="best-scolarships-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-scolarships-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-scolarships-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-scolarships-section-signed__card-deadline-box">
                            <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-scolarships-section-signed__card-deadline">
                            <div class="deadline-number">
                                <h2 class="deadline-header">Hours:Days:Months</h2>
                                <h3 class="deadline-value">23:23:23</h3>
                            </div>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="opportunities-signed.html" class="btn-view-more">View More</a>
    </div>
    <div class="best-jobs-section-signed">
        <h1 class="best-jobs-section-signed__header">Best Jobs</h1>
        <div class="best-jobs-section-signed__cards-info">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="best-jobs-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/Bg-jobs-big.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-jobs-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-jobs-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-jobs-section-signed__card-deadline-box">
                            <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-jobs-section-signed__card-deadline">
                            <div class="deadline-number">
                                <h2 class="deadline-header">Hours:Days:Months</h2>
                                <h3 class="deadline-value">23:23:23</h3>
                            </div>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                    <div class="best-jobs-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/Bg-jobs-big.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-jobs-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-jobs-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-jobs-section-signed__card-deadline-box">
                            <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-jobs-section-signed__card-deadline">
                            <div class="deadline-number">
                                <h2 class="deadline-header">Hours:Days:Months</h2>
                                <h3 class="deadline-value">23:23:23</h3>
                            </div>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                    <div class="best-jobs-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/Bg-jobs-big.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-jobs-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-jobs-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-jobs-section-signed__card-deadline-box">
                            <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-jobs-section-signed__card-deadline">
                            <div class="deadline-number">
                                <h2 class="deadline-header">Hours:Days:Months</h2>
                                <h3 class="deadline-value">23:23:23</h3>
                            </div>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                    <div class="best-jobs-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/Bg-jobs-big.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-jobs-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-jobs-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-jobs-section-signed__card-deadline-box">
                            <img src="img/Icon ionic-ios-timer.svg" alt="deadline" class="best-jobs-section-signed__card-deadline">
                            <div class="deadline-number">
                                <h2 class="deadline-header">Hours:Days:Months</h2>
                                <h3 class="deadline-value">23:23:23</h3>
                            </div>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="jobs-signed.html" class="btn-view-more">View More</a>
    </div>
    <div class="best-services-section-signed">
        <h1 class="best-services-section-signed__header">Best Services</h1>
        <div class="best-services-section-signed__cards-info">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="best-services-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-services-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-services-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-services-section-signed__card-rating-box">
                            <img src="img/star-rating.svg" alt="Rating" class="best-services-section-signed__card-rating">
                            <span class="rating-number">5</span>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                    <div class="best-services-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-services-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-services-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-services-section-signed__card-rating-box">
                            <img src="img/star-rating.svg" alt="Rating" class="best-services-section-signed__card-rating">
                            <span class="rating-number">5</span>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                    <div class="best-services-section-signed__card swiper-slide">
                        <div class="card-picture-box">
                            <span class="opportunity-type-label">Fully funded</span>
                            <img src="img/card-picutre-1.png" alt="Picutre 1" class="card-picture">
                        </div>
                        <h1 class="best-services-section-signed__card-header">Study business at Yale</h1>
                        <p class="best-services-section-signed__card-paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perspiciatis aliquam, laboriosam inventore quisquam dolores placeat veniam hic mollitia?</p>
                        <div class="best-services-section-signed__card-rating-box">
                            <img src="img/star-rating.svg" alt="Rating" class="best-services-section-signed__card-rating">
                            <span class="rating-number">5</span>
                            <a href="#" class="details-button">Details</a href="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="services-signed.html" class="btn-view-more">View More</a>
    </div>
    <div class="best-organizations-section-signed">
        <h1 class="best-organizations-section-signed__header">Best Organization</h1>
        <div class="best-organizations-section-signed__cards-info">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="best-organizations-section-signed__card swiper-slide">
                        <div class="colored-container"></div>
                        <div class="logo-box">
                            <img src="img/Cargomatic_(Company)_Logo.png" alt="Logo" class="best-jobs-section__logo">
                        </div>
                        <h1 class="best-organizations-section-signed__sub-header"> Cargomatic</h1>
                        <p class="best-organizations-section-signed__followers"> 6,494,456 followers</p>
                        <a href="#" class="best-organizations-section-signed__btn-follow">Follow</a>
                    </div>
                    <div class="best-organizations-section-signed__card swiper-slide">
                        <div class="colored-container"></div>
                        <div class="logo-box">
                            <img src="img/Cargomatic_(Company)_Logo.png" alt="Logo" class="best-jobs-section__logo">
                        </div>
                        <h1 class="best-organizations-section-signed__sub-header"> Cargomatic</h1>
                        <p class="best-organizations-section-signed__followers"> 6,494,456 followers</p>
                        <a href="#" class="best-organizations-section-signed__btn-follow">Follow</a>
                    </div>
                    <div class="best-organizations-section-signed__card swiper-slide">
                        <div class="colored-container"></div>
                        <div class="logo-box">
                            <img src="img/Cargomatic_(Company)_Logo.png" alt="Logo" class="best-jobs-section__logo">
                        </div>
                        <h1 class="best-organizations-section-signed__sub-header"> Cargomatic</h1>
                        <p class="best-organizations-section-signed__followers"> 6,494,456 followers</p>
                        <a href="#" class="best-organizations-section-signed__btn-follow">Follow</a>
                    </div>
                    <div class="best-organizations-section-signed__card swiper-slide">
                        <div class="colored-container"></div>
                        <div class="logo-box">
                            <img src="img/Cargomatic_(Company)_Logo.png" alt="Logo" class="best-jobs-section__logo">
                        </div>
                        <h1 class="best-organizations-section-signed__sub-header"> Cargomatic</h1>
                        <p class="best-organizations-section-signed__followers"> 6,494,456 followers</p>
                        <a href="#" class="best-organizations-section-signed__btn-follow">Follow</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="organizations-signed.html" class="btn-view-more">View More</a>
    </div>
    <div class="blog-section">
        <h1 class="blog-section__header">Blogs</h1>
        <div class="blog-section__cards-info">
            <div class="blog-section__card">
                <div class="blog-section__pic-box">
                    <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
                </div>
                <div class="blog-card-content">
                    <h1 class="blog-card-content__header">Events and conferences</h1>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Comments:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Participants:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blog-section__btn">visit</a>
            </div>
            <div class="blog-section__card">
                <div class="blog-section__pic-box">
                    <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
                </div>
                <div class="blog-card-content">
                    <h1 class="blog-card-content__header">Events and conferences</h1>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Comments:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Participants:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blog-section__btn">visit</a>
            </div>
            <div class="blog-section__card">
                <div class="blog-section__pic-box">
                    <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
                </div>
                <div class="blog-card-content">
                    <h1 class="blog-card-content__header">Events and conferences</h1>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Comments:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Participants:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blog-section__btn">visit</a>
            </div>
            <div class="blog-section__card">
                <div class="blog-section__pic-box">
                    <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
                </div>
                <div class="blog-card-content">
                    <h1 class="blog-card-content__header">Events and conferences</h1>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Comments:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Participants:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blog-section__btn">visit</a>
            </div>
            <div class="blog-section__card">
                <div class="blog-section__pic-box">
                    <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
                </div>
                <div class="blog-card-content">
                    <h1 class="blog-card-content__header">Events and conferences</h1>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Comments:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Participants:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blog-section__btn">visit</a>
            </div>
            <div class="blog-section__card">
                <div class="blog-section__pic-box">
                    <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
                </div>
                <div class="blog-card-content">
                    <h1 class="blog-card-content__header">Events and conferences</h1>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Comments:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Participants:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blog-section__btn">visit</a>
            </div>
            <div class="blog-section__card">
                <div class="blog-section__pic-box">
                    <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
                </div>
                <div class="blog-card-content">
                    <h1 class="blog-card-content__header">Events and conferences</h1>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Comments:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Participants:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blog-section__btn">visit</a>
            </div>
            <div class="blog-section__card">
                <div class="blog-section__pic-box">
                    <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
                </div>
                <div class="blog-card-content">
                    <h1 class="blog-card-content__header">Events and conferences</h1>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Comments:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Participants:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blog-section__btn">visit</a>
            </div>
            <div class="blog-section__card">
                <div class="blog-section__pic-box">
                    <img src="img/blog-pic.png" alt="blog pic" class="blog-section__pic">
                </div>
                <div class="blog-card-content">
                    <h1 class="blog-card-content__header">Events and conferences</h1>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Comments:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                    <div class="blog-card-content-info">
                        <p class="blog-card-content__subtitle">Participants:</p>
                        <p class="blog-card-content__subtitle-value">539</p>
                    </div>
                </div>
                <a href="#" class="blog-section__btn">visit</a>
            </div>
        </div>
        <a href="blogs.html" class="btn-view-more">View More</a>
    </div>
    <footer class="footer">
        <div class="footer__content-box">
            <div class="footer__left">
                <img src="img/truescho-logo-new-version.png" alt="new logo" class="footer__left-logo">
                <div class="footer__left-social">
                    <a href="#"" class=" footer__left-social-icon">
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
                        <li class="footer__right-info-list-item"><a href="#">Contact us</a></li>
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
    <script src="js/main.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>

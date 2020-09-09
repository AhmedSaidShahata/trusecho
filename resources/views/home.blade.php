<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/admin/style.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="/css/admin/{{LaravelLocalization::getCurrentLocale()}}-style.css" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>

    <span hidden class="lang">{{$lang='_'.LaravelLocalization::getCurrentLocale()}}</span>
    <span hidden class="my_lang">{{'/'.LaravelLocalization::getCurrentLocale()}}</span>

    <!-- <div class="popup ">
        <div class="row justify-content-center align-items-center w-100">
            <div class="text-center features col-md-3">
                <a href="{{route('admin.users.index')}}">
                    <div><i class="fas fa-users"></i></div>
                    <p>Users</p>
                </a>
            </div>
            <div class="text-center features col-md-3">

                <a href="{{route('admin.blogs.index')}}">
                    <div><i class="far fa-clipboard"></i></div>
                    <p>Blogs</p>
                </a>
            </div>
            <div class="text-center features col-md-3">


                <a href="{{route('admin.categories.index')}}">
                    <div><i class="far fa-clipboard"></i></div>
                    <p>Category Blog</p>
                </a>
            </div>
        </div>
    </div> -->


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><i class="fas fa-tachometer-alt"></i> {{__('messages.admin_dash')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul style="list-style: none; font-size:20px;" class="parent-ul ">
                {{!$lang=LaravelLocalization::getCurrentLocale()}}
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="{{ $localeCode == $lang ? 'hidden' : '' }}" style="margin: 13px 15px 0px 14px; text-transform: uppercase;">

                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $localeCode }}
                    </a>
                </li>
                @endforeach
                <ul class="d-lg-none responsive_control d-xs-block list-group">
                    <li class="list-group-item">
                        <a href="{{route('admin.users.index')}}"><i class="fas fa-users"></i>{{__('messages.users')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.organizations.index')}}"><i class="fas fa-users"></i> {{__('messages.organizations')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.newsorgs.index')}}"><i class="fas fa-users"></i> {{__('messages.news')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.services.index')}}"><i class="fas fa-gifts"></i> {{__('messages.services')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.scholarships.index')}}"><i class="fas fa-gifts"></i> {{__('messages.scholarships')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.jobs.index')}}"><i class="fas fa-gifts"></i> {{__('messages.jobs')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.blogs.index')}}"><i class="far fa-clipboard"></i> {{__('messages.blogs')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.opportunitys.index')}}"><i class="far fa-clipboard"></i> {{__('messages.opportunities')}}</a>
                    </li>
                    <li class="list-group-item" style="border-bottom: 1px solid white;"></li>

                    <li class="list-group-item">
                        <a href="{{route('admin.categories.index')}}"><i class="fas fa-plus-circle"></i> {{__('messages.categories')}}</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{{route('admin.costs.index')}}"><i class="fas fa-money-bill-alt"></i> {{__('messages.costs')}}</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{{route('admin.types.index')}}"><i class="fas fa-gifts"></i> {{__('messages.types')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.specializations.index')}}"><i class="fas fa-gifts"></i> {{__('messages.specializations')}}</a>
                    </li>

                    <li class="list-group-item" style="border-bottom: 1px solid white;"></li>
                    <li class="list-group-item">
                        <a href="{{route('admin.jobapps.index')}}"><i class="fas fa-gifts"></i> {{__('messages.job_app')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.appscholarships.index')}}"><i class="fas fa-gifts"></i> {{__('messages.scholar_app')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.faqs.index')}}"><i class="fas fa-gifts"></i> {{__('messages.faqs')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.contacts.index')}}"><i class="fas fa-gifts"></i> {{__('messages.contacts')}}</a>
                    </li>


            </ul>


        </div>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">



                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img style="width:50px;height:50px;" src="/storage/{{ Auth::user()->profile->picture }}" alt="user pic" class="user-pic rounded-circle" />
                    {{ Auth::user()->name }} <span class="caret"></span>
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
            </li>
            @endguest
        </ul>
    </nav>


    <section class="admin-body">
        <div class="row">
            <div class="col-lg-3  d-none  d-lg-block pr-0 side-bar">
                <ul class=" list-group">
                    <li class="list-group-item">
                        <a href="{{route('admin.users.index')}}"><i class="fas fa-users"></i>{{__('messages.users')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.organizations.index')}}"><i class="fas fa-users"></i> {{__('messages.organizations')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.newsorgs.index')}}"><i class="fas fa-users"></i> {{__('messages.news')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.services.index')}}"><i class="fas fa-gifts"></i> {{__('messages.services')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.scholarships.index')}}"><i class="fas fa-gifts"></i> {{__('messages.scholarships')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.jobs.index')}}"><i class="fas fa-gifts"></i> {{__('messages.jobs')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.blogs.index')}}"><i class="far fa-clipboard"></i> {{__('messages.blogs')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.opportunitys.index')}}"><i class="far fa-clipboard"></i> {{__('messages.opportunities')}}</a>
                    </li>
                    <li class="list-group-item" style="border-bottom: 1px solid white;"></li>

                    <li class="list-group-item">
                        <a href="{{route('admin.categories.index')}}"><i class="fas fa-plus-circle"></i> {{__('messages.categories')}}</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{{route('admin.costs.index')}}"><i class="fas fa-money-bill-alt"></i> {{__('messages.costs')}}</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{{route('admin.types.index')}}"><i class="fas fa-gifts"></i> {{__('messages.types')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.specializations.index')}}"><i class="fas fa-gifts"></i> {{__('messages.specializations')}}</a>
                    </li>

                    <li class="list-group-item" style="border-bottom: 1px solid white;"></li>
                    <li class="list-group-item">
                        <a href="{{route('admin.jobapps.index')}}"><i class="fas fa-gifts"></i> {{__('messages.job_app')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.appscholarships.index')}}"><i class="fas fa-gifts"></i> {{__('messages.scholar_app')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.faqs.index')}}"><i class="fas fa-gifts"></i> {{__('messages.faqs')}}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.contacts.index')}}"><i class="fas fa-gifts"></i> {{__('messages.contacts')}}</a>
                    </li>

                </ul>
            </div>
            <div class="contain col-lg-9 ">
                @yield('content')

            </div>
        </div>

    </section>

    <script>
        $(function() {


            let myLang = $(".my_lang").text()
            //=========================================== Start bestscholar  With Ajax ===============================
            $(document).on("click", ".best-scholar", function() {

                let reference = $(this);
                let scholarId = reference.data("scholarid");


                $.ajax({
                    url:myLang+"/admin/bestscholars ",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        scholarId: scholarId,

                    },
                    success: function(data) {
                        if (reference.text() == ' Best ') {
                            reference.text(' Unbest ')

                        } else {
                            reference.text(' Best ');

                        }
                    }
                })
            })
            //=========================================== Start best jobs  With Ajax ===============================
            $(document).on("click", ".best-job", function() {

                let reference = $(this);
                let jobId = reference.data("jobid");

                $.ajax({
                    url:myLang+"/admin/bestjobs ",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        jobId: jobId,

                    },
                    success: function(data) {
                        if (reference.text() == ' Best ') {
                            reference.text(' Unbest ')

                        } else {
                            reference.text(' Best ');

                        }
                    }
                })
            })
            //=========================================== Start best jobs  With Ajax ===============================
            $(document).on("click", ".best-service", function() {

                let reference = $(this);
                let serviceId = reference.data("serviceid");

                $.ajax({
                    url:myLang+"/admin/bestservices ",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        serviceId: serviceId,

                    },
                    success: function(data) {
                        if (reference.text() == ' Best ') {
                            reference.text(' Unbest ')

                        } else {
                            reference.text(' Best ');

                        }
                    }
                })
            })
            //=========================================== Start best jobs  With Ajax ===============================
            $(document).on("click", ".best-organization", function() {

                let reference = $(this);
                let organizationId = reference.data("organizationid");

                $.ajax({
                    url:myLang+"/admin/bestorganizations ",
                    type: "post",
                    dataType: "text",
                    data: {
                        _token: "{{csrf_token()}}",
                        organizationId: organizationId,

                    },
                    success: function(data) {
                        if (reference.text() == ' Best ') {
                            reference.text(' Unbest ')

                        } else {
                            reference.text(' Best ');

                        }
                    }
                })
            })
        })
    </script>


</body>

</html>

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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
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
        <a class="navbar-brand" href="#"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

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
            <div class="col-md-3 pr-0 side-bar">
                <ul class=" list-group">
                    <li class="list-group-item">
                        <a href="{{route('admin.users.index')}}"><i class="fas fa-users"></i> Users</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.organizations.index')}}"><i class="fas fa-users"></i> Organizations</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.services.index')}}"><i class="fas fa-gifts"></i> Services</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.scholarships.index')}}"><i class="fas fa-gifts"></i> Scholarships</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.jobs.index')}}"><i class="fas fa-gifts"></i> jobs</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.blogs.index')}}"><i class="far fa-clipboard"></i> Blogs</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.opportunitys.index')}}"><i class="far fa-clipboard"></i> Opportunities</a>
                    </li>
                    <li class="list-group-item" style="border-bottom: 1px solid white;"></li>

                    <li class="list-group-item">
                        <a href="{{route('admin.categories.index')}}"><i class="fas fa-plus-circle"></i> Categories</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{{route('admin.costs.index')}}"><i class="fas fa-money-bill-alt"></i> Costs</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{{route('admin.types.index')}}"><i class="fas fa-gifts"></i> Types</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.specializations.index')}}"><i class="fas fa-gifts"></i> Specializations</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.languages.index')}}"><i class="fas fa-gifts"></i> languages</a>
                    </li>
                    <li class="list-group-item" style="border-bottom: 1px solid white;"></li>
                    <li class="list-group-item">
                        <a href="{{route('admin.jobapps.index')}}"><i class="fas fa-gifts"></i> Job Applications</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.appscholarships.index')}}"><i class="fas fa-gifts"></i> Scholarship Applications</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.faqs.index')}}"><i class="fas fa-gifts"></i> Faqs</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.contacts.index')}}"><i class="fas fa-gifts"></i> Contacts</a>
                    </li>

                </ul>
            </div>
            <div class="col-md-9 ">
                @yield('content')

            </div>
        </div>

    </section>


</body>

</html>

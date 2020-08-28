<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->


    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <link rel="stylesheet" href="/css/font-style.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <!-- POPPINS FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <!-- SWIPER JS CSS STYLE -->

</head>

<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>

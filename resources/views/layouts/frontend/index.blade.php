<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/assets/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/assets/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/assets/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('public/assets/favicon_io/site.webmanifest')}}">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="{{asset('public/assets/css/style.responsive.css')}}" media="all">

    <script src="{{asset('public/assets/js/jquery.js')}}"></script>
    <script src="{{asset('public/assets/js/script.js')}}"></script>
    <script src="{{asset('public/assets/js/script.responsive.js')}}"></script>
    <link rel="stylesheet" href="{{asset('public/assets/css/slider.css')}}" media="all">

     <!--Custom JS-->
     @stack('js')

    <!--Custom CSS-->
    @stack('css')

</head>
<body>

    <div id="art-main">
        <div class="art-sheet clearfix">
            @include('layouts.frontend.header')

            @yield('content')

            @include('layouts.frontend.footer')
        </div>
    </div>

</body>
</html>

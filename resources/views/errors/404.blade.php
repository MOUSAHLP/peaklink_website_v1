<!DOCTYPE html>
<html dir="rtl"   lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="@yield('copyright')">
    <meta name="robots" content="@yield('copyright')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="Auth admin">

    <meta property="og:keywords" content="@yield('meta_keywords')">
    <meta property="og:title" content="@yield('meta_title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:author" content="Auth admin">

    <!-- MS Tile - for Microsoft apps-->
    <meta name="msapplication-TileImage" content="@yield('meta_image')">
    <!-- Site Name, Title, and Description to be displayed -->
    <meta property="og:site_name" content="كلاود زون">
    <meta property="og:title" content="@yield('meta_title')">
    <meta property="og:description" content="@yield('meta_description')">
    <!-- Image to display -->
    <meta property="og:image" content="@yield('meta_image')">
    <!-- No need to change anything here -->
    <meta property="og:type" content="website" />
    <meta property="og:image:type" content="image/*">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
    <!-- Website to visit when clicked in fb or WhatsApp-->
    <meta property="og:url" content="@yield('copyright')">

    <title>@yield('title')</title>
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/slick-theme.cs') }}s">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/slick.css') }}">
    <link rel="shortcut icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">

    {{-- RTL Style  --}}
    <link href="{{ asset('front/css/style-rtl.css') }}" rel="stylesheet">

    {{-- LTR Style  --}}
    {{-- <link href="{{ asset('front/css/style.css') }}" rel="stylesheet"> --}}



</head>

<body>
    <div class="page-wrapper">

        <div class="preloader"></div>

        <section class>
            <div class="auto-container pt-120 pb-70">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="error-page__inner">
                            <div class="error-page__title-box">
                                <img src="{{ asset('front/images/resource/404.jpg') }}" alt>
                                <h3 class="error-page__sub-titl">الصفحة غير موجودة!</h3>
                            </div>
                            <p class="error-pa">عذرًا، لا يمكننا العثور على تلك الصفحة! الصفحة التي تبحث عنها لم تكن موجودة أبدًا.</p>
                         
                            <a href="{{ route('Home') }}" class="theme-btn btn-style-one shop-now"><span class="btn-title">العودة إلى الصفحة الرئيسية</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="{{ asset('front/js/jquery.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/slick.min.js') }}"></script>
    <script src="{{ asset('front/js/slick-animation.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('front/js/progress-bar.js') }}"></script>
    <script src="{{ asset('front/js/wow.js') }}"></script>
    <script src="{{ asset('front/js/appear.js') }}"></script>
    <script src="{{ asset('front/js/mixitup.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
</body>


</html>
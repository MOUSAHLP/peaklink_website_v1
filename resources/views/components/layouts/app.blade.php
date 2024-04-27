<!DOCTYPE html>
<html dir="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @php
            use App\Models\Setting;
            use App\Models\Footer;
            $setting = Setting::first();
            $footers = Footer::all();
            $logo_alt = 'logo';
        @endphp

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="copyright" content="@yield('copyright', 'Peak Link')">
        <meta name="robots" content="@yield('copyright', 'Peak Link')">
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
        <meta property="og:site_name" content="Peak Link">
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
        <meta property="og:url" content="@yield('copyright', 'Peak Link')">

        {{-- <title>{{ $title }}</title> --}}
        <title> @yield('title', 'Peak Link') </title>

        <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/slick-theme.cs') }}s">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/slick.css') }}">
        <link rel="shortcut icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">

        {{-- RTL Style  --}}
        @if (str_replace('_', '-', app()->getLocale()) == 'ar')
            <link href="{{ asset('front/css/style-rtl.css') }}" rel="stylesheet">
        @else
            {{-- LTR Style  --}}
            <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
        @endif


        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-DE7CFR9YER"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-DE7CFR9YER');
        </script>

        @if (isset($setting->color['primary']))
            <style>
                :root {
                    --theme-color1: {{ $setting->color['primary'] }};
                }
            </style>
        @endif
        @if (isset($setting->color['secondary']))
            <style>
                :root {
                    --second-color: {{ $setting->color['secondary'] }};
                }
            </style>
        @endif
        @if (isset($setting->color['third']))
            <style>
                :root {
                    --theme-color1: {{ $setting->color['third'] }};
                }
            </style>
        @endif
    </head>

    <body class="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="page-wrapper">

            <header class="main-header header-style-one">
                <div class="header-lower">
                    <div class="auto-container">

                        <div class="main-box">
                            <div class="logo-box">
                                <div class="logo">
                                    <a href="{{ route('Home') }}">
                                        @if (isset($setting->headerlogo))
                                            <x-curator-glider :media="$setting->headerlogo" :alt="$logo_alt" />
                                        @endif

                                </div>
                            </div>

                            <div class="nav-outer">
                                <nav class="nav main-menu">
                                    <ul class="navigation">
                                        <li class="current"> <a href="{{ route('Home') }}"> @lang('home/homepage.homepage')</a>
                                        </li>
                                        <li> <a href="{{ route('aboutUs') }}"> @lang('home/homepage.aboutUS')</a></li>
                                        <li> <a href="{{ route('services') }}"> @lang('home/homepage.services')</a> </li>


                                        <li class="dropdown"><a href="#">@lang('home/homepage.pages') </a>
                                            <ul>
                                                <li> <a href="{{ route('Projects') }}">@lang('home/homepage.projects') </a> </li>
                                                <li> <a href="{{ route('Products') }}"> @lang('home/homepage.products')</a></li>
                                                <li> <a href="{{ route('team') }}"> @lang('home/homepage.team') </a> </li>
                                                <li> <a href="{{ route('Posts') }}"> @lang('home/homepage.blogs') </a></li>
                                                <li> <a href="{{ route('Testimonial') }}"> @lang('home/homepage.testimonials') </a></li>
                                            </ul>
                                        </li>



                                        <li><a href="{{ route('contactUs') }}"> @lang('home/homepage.contactUs') </a></li>


                                        <li class="dropdown">
                                            <a>{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'العربية' : 'English' }}
                                                @svg('heroicon-o-globe-alt', ['style' => 'color: white; width: 30px;padding: 5px;'])
                                            </a>
                                            <ul>
                                                <li> <a href="{{ route('ar') }}">العربية</a> </li>
                                                <li> <a href="{{ route('en') }}">English</a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                            <div class="outer-box">
                                <div class="search-btn">
                                    <a href="#" class="search"><i class="flaticon-search-3"></i></a>
                                </div>
                                <div class="btn">
                                    <a href="{{ route('contactUs') }}" class="theme-btn"> @lang('home/homepage.letUsTalk') </a>
                                </div>
                                <div class="mobile-nav-toggler">
                                    <i class="fa fa-bars"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mobile-menu">
                    <div class="menu-backdrop"></div>

                    <nav class="menu-box">
                        <div class="upper-box">
                            <div class="nav-logo"><a href="{{ route('Home') }}">
                                    @if (isset($setting->headerlogo))
                                        <x-curator-glider :media="$setting->headerlogo" :alt="$logo_alt" />
                                    @endif
                                </a></div>
                            <div class="close-btn"><i class="icon fa fa-times"></i></div>
                        </div>
                        <ul class="navigation clearfix">

                        </ul>
                        <ul class="contact-list-one">
                            <li>

                                <div class="contact-info-box">
                                    <i class="icon lnr-icon-phone-handset"></i>
                                    <span class="title"> @lang('home/homepage.CallNow') </span>
                                    <a href="tel:+#">77777</a>
                                </div>
                            </li>
                            <li>

                                <div class="contact-info-box">
                                    <span class="icon lnr-icon-envelope1"></span>
                                    <span class="title"> @lang('home/homepage.SendEmail')</span>
                                    <a href=""><span class="cf_email"
                                            data-cfemail="">[email&#160;protected]</span></a>
                                </div>
                            </li>
                            <li>

                                <div class="contact-info-box">
                                    <span class="icon lnr-icon-clock"></span>
                                    <span class="title"> @lang('home/homepage.SendEmail')</span>
                                    Mon - Sat 8:00 - 6:30, Sunday - CLOSED
                                </div>
                            </li>
                        </ul>
                        <ul class="social-links">
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </nav>
                </div>

                <div class="search-popup">
                    <span class="search-back-drop"></span>
                    <button class="close-search"><span class="fa fa-times"></span></button>
                    <div class="search-inner">
                        <form method="post" action="#">
                            <div class="form-group">
                                <input type="search" name="search-field" value placeholder="Search..." required>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="sticky-header">
                    <div class="auto-container">
                        <div class="inner-container">

                            <div class="logo">
                                <a href="{{ route('Home') }}" title>
                                    @if (isset($setting->headerlogo))
                                        <x-curator-glider :media="$setting->headerlogo" :alt="$logo_alt" />
                                    @endif
                                </a>
                            </div>

                            <div class="nav-outer">

                                <nav class="main-menu">
                                    <div class="navbar-collapse show collapse clearfix">
                                        <ul class="navigation clearfix">

                                        </ul>
                                    </div>
                                </nav>

                                <div class="mobile-nav-toggler">
                                    <i class="fa fa-bars"></i>
                                </div>
                            </div>
                            <div class="btn">
                                <a href="{{ route('contactUs') }}" class="theme-btn"> @lang('home/homepage.letUsTalk') </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            {{ $slot }}


            <footer class="main-footer footer-style-one">


                <div class="widgets-section">
                    <div class="auto-container">
                        <div class="logo-box">
                            <div class="logo"><a href="{{ route('Home') }}">
                                    <x-curator-glider :media="$setting->footerlogo" :alt="$logo_alt" />
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="footer-column col-lg-3 col-sm-5">
                                <div class="footer-widget contact-widget">
                                    <div class="widget-content">
                                        <div class="content-box">
                                            <a href="mailto:{{ $setting->email }}">
                                                <div class="icon-box">
                                                    <i class="flaticon-envelope"></i>
                                                </div>
                                                <span>@lang('home/homepage.ourEmail')</span>
                                                <h6 class="title">{{ $setting->email }}</h6>
                                            </a>

                                        </div>
                                        <div class="content-box">
                                            <a href="tel:{{ $setting->prefixed_phone }}">

                                                <div class="icon-box">
                                                    <i class="flaticon-phone"></i>
                                                </div>
                                                <span>@lang('home/homepage.phone')</span>
                                                <h6 class="title">{{ $setting->prefixed_phone }}</h6>
                                            </a>

                                        </div>
                                        <div class="content-box">
                                            <div class="icon-box">
                                                <i class="flaticon-placeholder"></i>
                                            </div>
                                            <span> @lang('home/homepage.location')</span>
                                            <h6 class="title">{{ $setting->location }}</h6>
                                        </div>
                                        <div class="content-box">
                                            <div class="icon-box">
                                                <i class="flaticon-clock-3"></i>
                                            </div>
                                            <span> @lang('home/homepage.openingTimes')</span>
                                            <h6 class="title"> @lang('home/homepage.from') {{ $setting->open_time }}
                                                @lang('home/homepage.until')
                                                {{ $setting->close_time }}</h6>

                                        </div>
                                        <a href="{{ route('contactUs') }}" type="button" class="theme-btn"><span
                                                class="btn-title">@lang('home/homepage.letUsTalk')</span>
                                            <i class="btn-icon far fa-arrow-left-long btn-icon me-2 font-size-18"></i>
                                        </a>
                                        <ul class="social-icons">
                                            @foreach ($setting->socials as $social)
                                                <li>
                                                    <a href="{{ $social['url'] }}">
                                                        @svg($social['icon'], ['style' => 'width: 20px;margin: 0 0 5px;'])
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            @foreach ($footers as $footer)
                                <div class="footer-column col-lg-3 col-sm-5">
                                    <div class="footer-widget links-widget pl-lg-30 pl-md--0">
                                        <h4 class="widget-title">{{ $footer->name }}</h4>
                                        <div class="widget-content">
                                            <ul class="user-links style-two">
                                                @foreach ($footer->links as $link)
                                                    <li><a href="{{ $link['url'] }}">{{ $link['text'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
        </div>

        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="copyright-text">© {{ __('home/homepage.PoweredBy') }}</div>
                </div>
            </div>
        </div>
        <div class="scroll-to-top scroll-to-target arrow-btn" data-target="html" style><i
                class="fa-sharp fa-solid fa-arrow-up"></i></div>
        </footer>

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

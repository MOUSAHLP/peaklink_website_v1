<!DOCTYPE html>
<html dir="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="copyright" content="@yield('copyright', 'peaklink')">
        <meta name="robots" content="@yield('copyright', 'peaklink')">
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
        <meta property="og:site_name" content="peaklink">
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
        <meta property="og:url" content="@yield('copyright', 'peaklink')">

        {{-- <title>{{ $title }}</title> --}}
        <title> @yield('title', 'peaklink') </title>

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
                                        <img src="{{ asset('front/images/logo.png') }}" alt title="Tronis"></a>
                                </div>
                            </div>

                            <div class="nav-outer">
                                <nav class="nav main-menu">
                                    <ul class="navigation">
                                        <li class="current"> <a href="{{ route('Home') }}"> @lang('home/homepage.homepage')</a>
                                        </li>
                                        <li> <a href="{{ route('aboutUs') }}"> @lang('home/homepage.aboutUS')</a></li>
                                        <li> <a href="#"> @lang('home/homepage.services')</a> </li>

                                        <li class="dropdown"><a href="#">@lang('home/homepage.pages') </a>
                                            <ul>
                                                <li> <a href="{{ route('Projects') }}">@lang('home/homepage.projects') </a> </li>
                                                <li> <a href="{{ route('team') }}"> @lang('home/homepage.team') </a> </li>
                                                <li> <a href="#"> @lang('home/homepage.products')</a></li>
                                                <li> <a href="#"> @lang('home/homepage.blogs') </a></li>
                                            </ul>
                                        </li>


                                        <li><a href="{{ route('contactUs') }}"> @lang('home/homepage.contactUs') </a></li>


                                        <li class="dropdown">
                                            <a href="#">{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'العربية' : 'English' }}
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
                            <div class="nav-logo"><a href="{{ route('Home') }}"><img
                                        src="{{ asset('front/images/logo.png') }}" alt title></a></div>
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
                                <a href="{{ route('Home') }}" title><img src="{{ asset('front/images/logo.png') }}"
                                        alt title></a>
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
                        </div>
                    </div>
                </div>
            </header>

            {{ $slot }}


            <footer class="main-footer footer-style-one">

                <div class="widgets-section">
                    <div class="auto-container">
                        <div class="row">

                            <div class="footer-column col-lg-3 col-sm-6">
                                <div class="footer-widget contact-widget">
                                    <div class="logo-box">
                                        <div class="logo"><a href="{{ route('Home') }}"><img
                                                    src="{{ asset('front/images/logo.png') }}" alt
                                                    title="Tronis"></a>
                                        </div>
                                    </div>
                                    <div class="widget-content">
                                        <div class="content-box">
                                            <div class="icon-box">
                                                <i class="flaticon-envelope"></i>
                                            </div>
                                            <span>البريد لنا</span>
                                            <h6 class="title">معلومات@بريدك.شركة</h6>
                                        </div>
                                        <div class="content-box">
                                            <div class="icon-box">
                                                <i class="flaticon-clock-3"></i>
                                            </div>
                                            <span>وقت متاح</span>
                                            <h6 class="title">۰۹ أكون - ۰۶ مساءً, الشمس - الخميس</h6>
                                        </div>
                                        <ul class="social-icons">
                                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-behance"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="footer-column col-lg-3 col-sm-6">
                                <div class="footer-widget links-widget pl-lg-30 pl-md--0">
                                    <h4 class="widget-title">خدماتنا</h4>
                                    <div class="widget-content">
                                        <ul class="user-links style-two">
                                            <li><a href="#">التسويق الرقمي</a></li>
                                            <li><a href="#">تصميم العلامات التجارية</a></li>
                                            <li><a href="#">تصميم المنتج</a></li>
                                            <li><a href="#">تطوير الشبكة</a></li>
                                            <li><a href="#">تطوير التطبيقات</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="footer-column col-lg-3 col-sm-6">
                                <div class="footer-widget links-widget two pl-lg-30 pl-md--0">
                                    <h4 class="widget-title">رابط مفيد</h4>
                                    <div class="widget-content">
                                        <ul class="user-links style-two">
                                            <li><a href="#">معلومات عنا</a></li>
                                            <li><a href="#">خدماتنا</a></li>
                                            <li><a href="#">لدينا محفظة</a></li>
                                            <li><a href="#">فريقنا</a></li>
                                            <li><a href="#">اتصل بنا</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="footer-column col-lg-3 col-sm-6">
                                <div class="footer-widget about-widget">
                                    <h4 class="widget-title">النشرة الإخبارية</h4>
                                    <div class="text">وقد تم الاعتماد على عملاء الشركات والترفيه للمسافرين </div>
                                    <div class="subscribe-form-two">
                                        <form method="post" action="#">
                                            <div class="form-group">
                                                <input type="email" name="email" class="email" value
                                                    placeholder="عنوان بريدك  الإلكتروني" required>
                                                <button type="button" class="theme-btn"><span
                                                        class="btn-title">إشترك
                                                        الآن</span><i
                                                        class="btn-icon far fa-arrow-left-long btn-icon me-2 font-size-18"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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

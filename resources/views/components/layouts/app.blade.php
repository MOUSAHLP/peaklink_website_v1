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

<body class="rtl">
    <div class="page-wrapper">

        <header class="main-header header-style-one">
            <div class="header-lower">
                <div class="auto-container">

                    <div class="main-box">
                        <div class="logo-box">
                            <div class="logo"><a href="index.html"><img src="images/logo.png" alt title="Tronis"></a>
                            </div>
                        </div>

                        <div class="nav-outer">
                            <nav class="nav main-menu">
                                <ul class="navigation">
                                    <li class="current dropdown"> <a href="index.html">بيت</a>
                                        <ul>
                                            <li><a href="index.html">Home page 01</a></li>
                                            <li><a href="index-2.html">Home page 02</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">الصفحات</a>
                                        <ul>
                                            <li><a href="page-about.html">About</a></li>
                                            <li class="dropdown"> <a href="#">Projects</a>
                                                <ul>
                                                    <li><a href="page-projects.html">Projects List</a></li>
                                                    <li><a href="page-project-details.html">Project Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"> <a href="#">Team</a>
                                                <ul>
                                                    <li><a href="page-team.html">Team List</a></li>
                                                    <li><a href="page-team-details.html">Team Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="page-testimonial.html">Testimonial</a></li>
                                            <li><a href="page-pricing.html">Pricing</a></li>
                                            <li><a href="page-faq.html">FAQ</a></li>
                                            <li><a href="page-404.html">Page 404</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">خدمات</a>
                                        <ul>
                                            <li><a href="page-services.html">Services List</a></li>
                                            <li><a href="page-service-details.html">Service Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">محل</a>
                                        <ul>
                                            <li><a href="shop-products.html">Products</a></li>
                                            <li><a href="shop-products-sidebar.html">Products with Sidebar</a></li>
                                            <li><a href="shop-product-details.html">Product Details</a></li>
                                            <li><a href="shop-cart.html">Cart</a></li>
                                            <li><a href="shop-checkout.html">Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">أخبار</a>
                                        <ul>
                                            <li><a href="news-grid.html">News Grid</a></li>
                                            <li><a href="news-details.html">News Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="page-contact.html">اتصال</a></li>
                                </ul>
                            </nav>

                        </div>
                        <div class="outer-box">
                            <div class="search-btn">
                                <a href="#" class="search"><i class="flaticon-search-3"></i></a>
                            </div>
                            <div class="btn">
                                <a href="page-contact.html" class="theme-btn">دعونا نتحدث</a>
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
                        <div class="nav-logo"><a href="index.html"><img src="images/logo.png" alt title></a></div>
                        <div class="close-btn"><i class="icon fa fa-times"></i></div>
                    </div>
                    <ul class="navigation clearfix">

                    </ul>
                    <ul class="contact-list-one">
                        <li>

                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <span class="title">Call Now</span>
                                <a href="tel:+#">77777</a>
                            </div>
                        </li>
                        <li>

                            <div class="contact-info-box">
                                <span class="icon lnr-icon-envelope1"></span>
                                <span class="title">Send Email</span>
                                <a
                                    href="#/cdn-cgi/l/email-protection#dbb3beb7ab9bb8b4b6abbab5a2f5b8b4b6"><span
                                        class="__cf_email__"
                                        data-cfemail="d4bcb1b8a494b7bbb9a4b5baadfab7bbb9">[email&#160;protected]</span></a>
                            </div>
                        </li>
                        <li>

                            <div class="contact-info-box">
                                <span class="icon lnr-icon-clock"></span>
                                <span class="title">Send Email</span>
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
                    <form method="post" action="#/2023/❤️-html/index.html">
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
                            <a href="index.html" title><img src="images/logo.png" alt title></a>
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
                                    <div class="logo"><a href="index.html"><img src="images/logo.png" alt
                                                title="Tronis"></a></div>
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
                                            <button type="button" class="theme-btn"><span class="btn-title">إشترك
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
                        <div class="copyright-text">© حقوق الطبع والنشر لعام ۲۰۲۳ لشركة ديجيتكس</div>
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

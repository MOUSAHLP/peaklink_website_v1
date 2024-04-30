<div>
    @if ($services->count() > 0)
        <section class="service-section">
            <div class="auto-container">

                <div class="sec-title text-center">
                    <h2>@lang('home/services.we_will_offer') <br>@lang('home/services.best_service')</h2>
                </div>
                <div class="row services-slider{{ app()->getlocale() == 'ar' ? '-rtl' : '' }}">
                    @foreach ($services as $service)
                        <div class="service-block col-lg-3 col-sm-6">
                            <a href="{{ route('servicesDetail', $service->id) }}">
                                <div class="inner-box">
                                    <div class="icon-box text-center">

                                        @svg($service->image)

                                    </div>
                                    <div class="content-box">
                                        <h3 class="title"><a
                                                href="{{ route('servicesDetail', $service->id) }}">{{ $service->title }}</a>
                                        </h3>
                                        <div class="text">{{ $service->short_description }}</div>
                                        <a href="{{ route('servicesDetail', $service->id) }}"
                                            data-animation-in="fadeInUp" data-delay-in="0.4"
                                            class="theme-btn ser-btn">@lang('home/services.more') <i
                                                class="btn-icon far fa-arrow-left-long btn-icon me-1"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        @script
            <script>
                $('.services-slider').slick({
                    infinite: true,
                    slidesToShow: 2,
                    arrows: true,
                    centerMode: true,
                    centerPadding: "400px",
                    slidesToScroll: 1,
                    dots: false,
                    responsive: [{
                            breakpoint: 1500,
                            settings: {
                                centerPadding: "100px",
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 1366,
                            settings: {
                                centerPadding: "100px",
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                centerPadding: "50px",
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 3,
                                centerPadding: 0,
                                centerMode: false,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 2,
                                centerPadding: 0,
                                centerMode: false,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 2,
                                centerPadding: 0,
                                centerMode: false,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                centerPadding: 0,
                                centerMode: false,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                });

                $('.services-slider-rtl').slick({
                    infinite: true,
                    slidesToShow: 2,
                    arrows: true,
                    centerMode: true,
                    centerPadding: "400px",
                    slidesToScroll: 1,
                    dots: false,
                    rtl: true,
                    responsive: [{
                            breakpoint: 1500,
                            settings: {
                                centerPadding: "100px",
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 1366,
                            settings: {
                                centerPadding: "100px",
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                centerPadding: "50px",
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 2,
                                centerPadding: 0,
                                centerMode: false,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 2,
                                centerPadding: 0,
                                centerMode: false,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 2,
                                centerPadding: 0,
                                centerMode: false,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                centerPadding: 0,
                                centerMode: false,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                });

                $('.slider-btn .prev-btn').click(function(e) {
                    //e.preventDefault();
                    $('.services-slider, .services-slider-rtl').slick('slickPrev');
                });

                $('.slider-btn .next-btn').click(function(e) {
                    //e.preventDefault();
                    $('.services-slider, .services-slider-rtl').slick('slickNext');
                });
            </script>
        @endscript
    @endif
</div>

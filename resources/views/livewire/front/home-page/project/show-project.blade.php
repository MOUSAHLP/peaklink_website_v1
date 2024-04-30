<div>

    @if (isset($Projects) & ($Projects->count() > 0))

        <section class="project-section">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>@lang('projects.recently_projects')</h2>
                    <div class="text">
                        @lang('projects.recently_projects_desc')
                    </div>
                </div>
                <div class="slider-btn">
                    <button class="next-btn"><span><i class="fa-regular fa-arrow-right-long btn-icon"></i></span></button>
                    <button class="prev-btn"><span><i class="fa-regular fa-arrow-right-long btn-icon"></i></span></button>
                </div>
            </div>
            <div class="row project-slider{{ app()->getlocale() == 'ar' ? '-rtl' : '' }}">

                @foreach ($Projects as $Project)
                    <div class="project-block col-lg-3 col-md-6">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image overlay-anim"><a href="{{ route('ProjectDetail', $Project->id) }}">
                                        <x-curator-glider :media="$Project->image" :alt="$Project->title" />
                                    </a></figure>
                                <figure class="image-2"><a href="{{ route('ProjectDetail', $Project->id) }}">

                                        <x-curator-glider :media="$Project->image" :alt="$Project->title" />


                                    </a></figure>
                            </div>
                            <div class="content-box">
                                <span>{{ $Project->categories->title }}</span>
                                <h6 class="title"><a
                                        href="{{ route('ProjectDetail', $Project->id) }}">{{ $Project->title }}</a></h6>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <a href="{{ route('Projects') }}" class="theme-btn more" style="margin-top: 20px">@lang('home/homepage.more')</a>
        </section>

        @script
            <script>
                $('.project-slider').slick({
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
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                centerPadding: "50px",
                                slidesToShow: 2,
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
                                slidesToShow: 1,
                                centerPadding: 0,
                                centerMode: false,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 1,
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

                $('.project-slider-rtl').slick({
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
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                centerPadding: "50px",
                                slidesToShow: 2,
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
                                slidesToShow: 1,
                                centerPadding: 0,
                                centerMode: false,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 1,
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
                    $('.project-slider, .project-slider-rtl').slick('slickPrev');
                });

                $('.slider-btn .next-btn').click(function(e) {
                    //e.preventDefault();
                    $('.project-slider, .project-slider-rtl').slick('slickNext');
                });
            </script>
        @endscript
    @endif

</div>

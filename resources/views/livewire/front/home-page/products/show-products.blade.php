<div>

    @if (isset($products) & ($products->count() > 0))

        <section class="project-section home">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>@lang('home/products.ourProducts')</h2>
                    <div class="text">
                        @lang('home/products.products_desc')
                    </div>
                </div>

                <div class="slider-btn">
                    <button class="next-btn"><span><i class="fa-regular fa-arrow-right-long btn-icon"></i></span></button>
                    <button class="prev-btn"><span><i class="fa-regular fa-arrow-right-long btn-icon"></i></span></button>


                </div>
            </div>
            <div class="row product-slider{{ app()->getlocale() == 'ar' ? '-rtl' : '' }}">

                @foreach ($products as $product)
                    <div class="product-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="{{ route('ProductsDetail', $product->slug) }}">
                                    <x-curator-glider :media="$product->image" :alt="$product->name" />
                            </div>
                            <div class="content">
                                <h4>
                                    <a href="{{ route('ProductsDetail', $product->slug) }}">{{ $product->name }}</a>
                                </h4>
                                <span class="price">{{ $product->category->name }}</span>
                            </div>
                            <div class="icon-box">
                                <a href="{{ route('productForm', $product->slug) }}" class="ui-btn add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('Products') }}" class="theme-btn more">@lang('home/homepage.more')</a>
        </section>
        @script
            <script>
                $('.product-slider').slick({
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
                                slidesToShow: 4,
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

                $('.product-slider-rtl').slick({
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
                                slidesToShow: 4,
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
                    $('.product-slider, .product-slider-rtl').slick('slickPrev');
                });

                $('.slider-btn .next-btn').click(function(e) {
                    //e.preventDefault();
                    $('.product-slider, .product-slider-rtl').slick('slickNext');
                });
            </script>
        @endscript
    @endif
</div>

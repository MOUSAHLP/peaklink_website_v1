<div>


    @if (isset($brands) && $brands->count() > 0)

        <section class="clients-section">
            <div class="auto-container pl-50 pr-50">
                <div class="sec-title text-center">
                    <h2> @lang('home/brands.brands')</h2>
                </div>

                <ul class="clients-carousel{{ app()->getlocale() == 'ar' ? '-rtl' : '' }}">
                    @foreach ($brands as $brand)
                        <li class="client-block-two">
                            <figure class="image overlay-anim">
                                <x-curator-glider :media="$brand->logo" :alt="$brand->slug" />
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        @script
            <script>
                $('.clients-carousel').slick({
                    infinite: true,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    dots: false,
                    responsive: [{
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                });

                $('.clients-carousel-rtl').slick({
                    infinite: true,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    dots: false,
                    rtl: true,
                    responsive: [{
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                });
            </script>
        @endscript
    @endif


</div>

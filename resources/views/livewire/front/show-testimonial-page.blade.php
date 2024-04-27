<div>
    @section('title', __('home/client_review.client_review'))

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('home/client_review.client_review'),
        'title' => __('home/client_review.client_review'),
    ])
    @endcomponent

    <section class="testimonial-section-two pb-90">
        <div class="auto-container">
            <div class="row">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-block-two mx-0 mb-30 col-lg-4 col-md-6 wow fadeInUp">
                        <div class="inner-box">
                            <div class="content-box">
                                <div class="auther-info">
                                    <x-curator-glider :media="$testimonial->client_image" :alt="$testimonial->client_name"
                                        style="width: 60px;border-radius: 50%;" />
                                    <div class="info-box">
                                        <h6 class="title">{{ $testimonial->client_name }}</h6>
                                        <span>{{ $testimonial->client_job }}</span>
                                    </div>
                                </div>
                                <div class="text">
                                    {{ $testimonial->description }}
                                </div>
                                <ul class="rating">
                                    @for ($i = 0; $i < $testimonial->stars; $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor

                                    @for ($j = $i; $j < 5; $j++)
                                        <li class="disabled"><i class="fa fa-star"></i></li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

</div>

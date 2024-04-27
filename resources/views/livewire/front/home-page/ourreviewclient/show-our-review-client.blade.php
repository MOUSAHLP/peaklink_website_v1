<div>


    @if (isset($OurReviewClients) & ($OurReviewClients->count() > 0))


        <section class="testimonial-section">
            <div class="inner-container">
                <div class="sec-title text-center">
                    <h2>
                        @lang('home/client_review.client_review_title')
                    </h2>
                </div>
                <div class="row testi-slider{{ app()->getlocale() == 'ar' ? '-rtl' : '' }}">

                    @foreach ($OurReviewClients as $OurReviewClient)
                        <div class="testimonial-block col-md-6">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <i class="flaticon-quote-1"></i>
                                </div>
                                <div class="content-box">
                                    <div class="text">
                                        {{ $OurReviewClient->description }}
                                    </div>
                                    <div class="auther-info">

                                        {{-- <img src="{{ 'storage/' . $OurReviewClient->client_image }}"
                                            alt="{{ $OurReviewClient->client_name }}"> --}}
                                        <figure class="image overlay-anim">
                                            <x-curator-glider :media="$OurReviewClient->client_image" :alt="$OurReviewClient->client_name" width="80"
                                                height="80" />
                                        </figure>

                                        <div class="info-box">
                                            <h6 class="title">
                                                {{ $OurReviewClient->client_name }}
                                            </h6>
                                            <span>

                                                {{ $OurReviewClient->client_job }}

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>


    @endif

</div>

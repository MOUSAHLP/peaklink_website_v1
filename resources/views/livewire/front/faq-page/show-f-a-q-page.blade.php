<div>
    @section('title', __('home/faq.faq'))

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('home/faq.faq'),
        'title' => __('home/faq.faq'),
    ])
    @endcomponent


    <section class="faqs-section">
        <div class="auto-container">
            <div class="row">

                <div class="faq-column col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-column">
                        <div class="sec-title light">
                            <h2 class="title">@lang('home/faq.see_faq')</h2>
                        </div>
                        <ul class="accordion-box wow fadeInRight">
                            @foreach ($faqs as $faq)
                                <li class="accordion block">
                                    <div class="acc-btn">{{ $faq->question }}<div class="icon fa fa-angle-down"></div>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="text">{{ $faq->answer }}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>

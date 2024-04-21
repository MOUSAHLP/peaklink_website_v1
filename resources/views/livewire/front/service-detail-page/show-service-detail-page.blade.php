<div>
    @section('title', 'peaklink-' . $service->title)

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => $service->title,
        'title' => __('home/services.services'),
    ])
    @endcomponent


    <section class="services-details">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-lg-4">
                    <div class="service-sidebar">

                        <div class="sidebar-widget service-sidebar-single">
                            <div class="sidebar-service-list">
                                <ul>
                                    <li><a href="page-service-details.html" class="current"><i
                                                class="fas fa-angle-right"></i><span>Website Development</span></a>
                                    </li>
                                    <li class="current"><a href="page-service-details.html"><i
                                                class="fas fa-angle-right"></i><span>Graphic Designing</span></a>
                                    </li>
                                    <li><a href="page-service-details.html"><i
                                                class="fas fa-angle-right"></i><span>Digital Marketing</span></a>
                                    </li>
                                    <li><a href="page-service-details.html"><i class="fas fa-angle-right"></i><span>Apps
                                                Development</span></a>
                                    </li>
                                    <li><a href="page-service-details.html"><i class="fas fa-angle-right"></i><span>Seo
                                                & Content
                                                Writing</span></a></li>
                                    <li><a href="page-service-details.html"><i class="fas fa-angle-right"></i><span>UI /
                                                UX Designing</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="service-details-help">
                                <div class="help-shape-1"></div>
                                <div class="help-shape-2"></div>
                                <h2 class="help-title">Contact with <br> us for any <br> advice</h2>
                                <div class="help-icon">
                                    <span class=" lnr-icon-phone-handset"></span>
                                </div>
                                <div class="help-contact">
                                    <p>Need help? Talk to an expert</p>
                                    <a href="tel:12463330079">+892 ( 123 ) 112 - 9999</a>
                                </div>
                            </div>

                            <div class="sidebar-widget service-sidebar-single mt-4">
                                <div class="service-sidebar-single-btn wow fadeInUp" data-wow-delay="0.5s"
                                    data-wow-duration="1200m">
                                    <a href="#" class="theme-btn btn-style-one d-grid"><span
                                            class="btn-title"><span class="fas fa-file-pdf"></span> download pdf
                                            file</span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-8 col-lg-8">
                    <div class="services-details__content">
                        {!! $service->description !!}


                        <div class="innerpage mt-25">
                            <h3>@lang('home/services.faq')</h3>
                            <p>
                                @lang('home/services.faq_desc')
                            </p>
                            <ul class="accordion-box wow fadeInRight">

                                @foreach ($service->faq as $faq)
                                    <li class="accordion block">
                                        <div class="acc-btn">{{ $faq['question'] }}
                                            <div class="icon fa fa-plus"></div>
                                        </div>
                                        <div class="acc-content">
                                            <div class="content">
                                                <div class="text">
                                                    {{ $faq['answer'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

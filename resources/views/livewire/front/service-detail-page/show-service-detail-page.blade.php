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

                                    @foreach ($serviceCategories as $serviceCategory)
                                        <li @if ($serviceCategory->id == $service->serviceCategory->id) class="current" @endif>
                                            <a href="{{ route('services') }}">
                                                <i class="fas fa-angle-right"></i>
                                                <span> {{ $serviceCategory->name }}</span></a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="service-details-help">
                                <div class="help-shape-1"></div>
                                <div class="help-shape-2"></div>
                                <h2 class="help-title">
                                    @lang('home/services.contact_with')
                                    <br>@lang('home/services.us_for_any')
                                    <br> @lang('home/services.advice')
                                </h2>
                                <div class="help-icon">
                                    <span class=" lnr-icon-phone-handset"></span>
                                </div>
                                <div class="help-contact">
                                    <p>@lang('home/services.talk_to_an_expert')</p>
                                    {{-- need to be linked with settings --}}
                                    <a href="tel:12463330079">+892 ( 123 ) 112 - 9999</a>
                                </div>
                            </div>

                            {{-- <div class="sidebar-widget service-sidebar-single mt-4">
                                <div class="service-sidebar-single-btn wow fadeInUp" data-wow-delay="0.5s"
                                    data-wow-duration="1200m">
                                    <a href="#" class="theme-btn btn-style-one d-grid"><span
                                            class="btn-title"><span class="fas fa-file-pdf"></span> download pdf
                                            file</span></a>
                                </div>
                            </div> --}}
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

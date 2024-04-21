<div>
    @section('title', __('home/services.services'))

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('home/services.services'),
        'title' => __('home/services.services'),
    ])
    @endcomponent
    <section class="service-section-two">
        <div class="auto-container">
            <div class="row">
                @foreach ($services as $service)
                    <div class="service-block-two col-xl-3 col-lg-4 col-md-6">
                        <a href="{{ route('servicesDetail', $service->id) }}">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <i class="flaticon-production"></i>
                                </div>
                                <div class="content-box">
                                    <h3 class="title"><a
                                            href="{{ route('servicesDetail', $service->id) }}">{{ $service->title }}</a>
                                    </h3>
                                    <div class="text">{{ $service->short_description }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>

<div>
    @section('title', __('home/services.services'))

    @component('components.breadcumb', [
        'image_url' => asset('images/page-title-bg.png'),
        'upper_title' => __('home/services.services'),
        'title' => __('home/services.services'),
    ])
    @endcomponent
    <section class="service-section-two featured-products">
        <div class="auto-container">

            <div class="mixitup-gallery">

                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all">@lang('home/services.all')</li>
                        @foreach ($categories as $category)
                            <li class="filter" data-role="button" data-filter=".category-{{ $category->id }}">
                                {{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="filter-list row">

                    @foreach ($services as $service)
                        <div
                            class="service-block-two mix all category-{{ $service->serviceCategory->id }} col-xl-3 col-lg-4 col-md-6">
                            <a href="{{ route('servicesDetail', $service->id) }}">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        {{-- <i class="flaticon-production"></i> --}}
                                        @svg($service->image, [
                                            'style' => 'width: 56px;height: 56px;',
                                        ])
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
        </div>
    </section>
</div>

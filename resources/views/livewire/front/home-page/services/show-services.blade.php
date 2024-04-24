<div>
    @if ($services->count() > 0)
        <section class="service-section">
            <div class="auto-container">

                <div class="sec-title text-center">
                    <h2>@lang('home/services.we_will_offer') <br>@lang('home/services.best_service')</h2>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="service-block col-lg-3 col-sm-6">
                            <a href="{{ route('servicesDetail', $service->id) }}">
                                <div class="inner-box">
                                    <div class="icon-box text-center">

                                        {{-- <x-curator-glider :media="$service->image" :alt="$service->title"/> --}}
                                        @svg($service->image, [
                                            'style' => 'width: 40px;height: 40px;',
                                        ])

                                    </div>
                                    <div class="content-box">
                                        <h3 class="title"><a
                                                href="{{ route('servicesDetail', $service->id) }}">{{ $service->title }}</a>
                                        </h3>
                                        <div class="text">{{ $service->short_description }}</div>
                                        <a href="{{ route('servicesDetail', $service->id) }}"
                                            data-animation-in="fadeInUp" data-delay-in="0.4"
                                            class="theme-btn ser-btn">@lang('home/services.more') <i
                                                class="btn-icon far fa-arrow-left-long btn-icon me-1"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
</div>

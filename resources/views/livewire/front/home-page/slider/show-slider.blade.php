<div>
    @if ($sliders->count() > 0)
        <section dir="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}" class="banner-section">
            <div
                class="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'banner-slider-rtl' : 'banner-slider' }} ">

                @foreach ($sliders as $slider)
                    <div class="banner-slide">

                        <x-curator-glider :media="$slider->image" :alt="$slider->title" />

                        <div class="outer-box">
                            <div class="auto-container">
                                <div class="content-box">
                                    <h1 data-animation-in="fadeInLeft" data-delay-in="0.2">{{ $slider->title }}</h1>
                                    <div data-animation-in="fadeInUp" data-delay-in="0.3" class="text">
                                        {{ $slider->description }}
                                    </div>
                                    <div class="btn-box">

                                        <a href="{{ $slider->button_link }}" data-animation-in="fadeInUp"
                                            data-delay-in="0.4" class="theme-btn"> {{ $slider->button_title }} <i
                                                class="btn-icon fa-sharp far fa-arrow-left ml-10 font-size-18"></i></a>

                                        {{-- @if ($slider->video != null)
                                            <a href="{{ 'storage/' . $slider->video }}" class="play-btn"
                                                data-fancybox="gallery" data-caption data-animation-in="fadeInLeft"
                                                data-delay-in="0.4">
                                                <i class="fa-sharp fa-solid fa-play"></i>
                                                <span>الفيديو</span>
                                        @endif --}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="banner-social">
                <h4>@lang('home/slider.follow_us')</h4>
                <ul>
                    @foreach ($socials as $social)
                        <li>
                            <a href="{{ $social['url'] }}" title>
                                @svg($social['icon'], ['style' => 'width: 20px;height: 20px;margin-bottom: 4px;'])
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

    @endif
</div>

<div>
    {{-- $AboutUs --}}
    <section dir="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}" class="page-title"
        @if (isset($AboutUs->sectionImage)) style="background-image: url({{ $AboutUs->sectionImage->url }});" @endif>
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ __('about_us.AboutUs') }}</h1>
                <ul class="page-breadcrumb">
                    @if (app()->getLocale() == 'ar')
                        <li>{{ __('about_us.AboutUs') }}</li>
                        <li><a href="{{ route('Home') }}">{{ __('about_us.Home') }}</a></li>
                    @else
                        <li><a href="{{ route('Home') }}">{{ __('about_us.Home') }}</a></li>
                        <li>{{ __('about_us.AboutUs') }}</li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
    <section class="about-section innerpage">

        <div class="auto-container">
            <div class="row">
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image overlay-anim">
                                <x-curator-glider :media="$AboutUs->back_image" :alt="$AboutUs->title" />
                            </figure>

                            @if ($AboutUs->video != null)
                                <div class="play-box">
                                    <figure class="image-2 overlay-anim">
                                        <img src="{{ asset('storage/' . $AboutUs->video) }}" width="200"
                                            alt="{{ $AboutUs->title }}">
                                    </figure>
                                    <a title href="#" data-fancybox="gallery" data-caption>
                                        <i class="icon fa fa-play"></i>
                                    </a>
                                </div>
                            @endif

                            <div class="exp-box">
                                <div class="icon-box">
                                    <img src="{{ asset('front/images/resource/tv.png') }}"
                                        alt="{{ $AboutUs->title }}">
                                </div>
                                <h4 class="title">{{ $AboutUs->label_title }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title light">
                            <h2 style="color:black;">{{ $AboutUs->title }}</h2>
                            <div class="text">
                                {{ $AboutUs->description }}
                            </div>
                        </div>
                        <div class="inner-box">

                            @if (isset($AboutUs->facts) && $AboutUs->facts != '')
                                @foreach ($AboutUs->facts as $fact)
                                    <div class="content-box">
                                        <span>{{ $fact['number'] }}</span>
                                        <h6 class="title">{{ $fact['title'] }}</h6>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                        <div class="btn-box">
                            <a href="{{ route('contactUs') }}" class="theme-btn-v2">{{ __('about_us.start') }} <i
                                    class="btn-icon far fa-arrow-left-long btn-icon me-1 font-size-18"></i></a>
                            <a href="tel:{{ $AboutUs->phone }}" class="contact-btn">
                                <i class="flaticon-telephone-1"></i>
                                <span>{{ __('about_us.contactUs') }}</span>
                                <h6 class="title">
                                    @if ($AboutUs != null)
                                        {{ $AboutUs->phone }}
                                    @else
                                        {{ __('about_us.not_found') }}
                                    @endif
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- faqs  Section  --}}
    <livewire:front.home-page.faqs.show-faq />

</div>

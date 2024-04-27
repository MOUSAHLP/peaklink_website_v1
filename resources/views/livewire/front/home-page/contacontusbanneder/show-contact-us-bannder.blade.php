<div>
    <section class="contact-banner-two">
        <div class="auto-container">
            <div class="outer-box">
                <h2 class="title wow fadeInLeft" data-wow-delay="400ms">
                    @lang('home/call_us_section.have_an_idea')
                    <br>
                    @lang('home/call_us_section.Lets_discuss')
                </h2>
                <div class="btn-box wow fadeInRight" data-wow-delay="400ms">
                    <a href="{{ route('contactUs') }}" class="theme-btn-v2">
                        @lang('home/call_us_section.free_consultations')
                        <i class="btn-icon far fa-arrow-left-long btn-icon me-2 font-size-18"></i>
                    </a>
                    <a href="tel:{{ $phone }}" class="theme-btn-v2 two">
                        {{ $phone }}
                        <i class="fa-sharp far fa-phone mr-10 font-size-18"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

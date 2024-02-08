<div>
    @if($services->count() > 0)
    <section class="service-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>سوف نقدم لك <br>أفضل خدمة</h2>
            </div>
            <div class="row">
                @foreach ($services as $service )
                    
                <div class="service-block col-lg-3 col-sm-6">
                    <div class="inner-box">
                        <div class="icon-box text-center">
                                
                <x-curator-glider :media="$service->image" :alt="$service->title"/>
                           
                        </div>
                        <div class="content-box">
                            <h3 class="title"><a href="page-service-details.html">{{ $service->title }}</a></h3>
                            <div class="text">{{ $service->short_description }}</div>
                            <a href="page-service-details.html" data-animation-in="fadeInUp" data-delay-in="0.4"
                                class="theme-btn ser-btn">يتعلم أكثر <i
                                    class="btn-icon far fa-arrow-left-long btn-icon me-1"></i></a>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </section>
    @endif
</div>

<div>

    {{-- $AboutUs --}}
    <section class="about-section">
        <div class="auto-container">
            <div class="row">

           
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image overlay-anim">
                                <x-curator-glider :media="$AboutUs->back_image" :alt="$AboutUs->title"/>
                            </figure>

                            @if($AboutUs->video != null)
                            <div class="play-box">
                                <figure class="image-2 overlay-anim">
                                    <img src="{{ asset('storage/'.$AboutUs->video) }}" width="200" alt="{{ $AboutUs->title }}">
                                </figure>
                                <a title href="#" data-fancybox="gallery"
                                    data-caption>
                                    <i class="icon fa fa-play"></i>
                                </a>
                            </div>
                                
                            @endif

                            <div class="exp-box">
                                <div class="icon-box">
                                    <img src="{{ asset('front/images/resource/tv.png') }}" alt="{{ $AboutUs->title }}">
                                </div>
                                <h4 class="title">{{ $AboutUs->label_title }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title light">
                            <h2>{{ $AboutUs->title }}</h2>
                            <div class="text">
                                {{ $AboutUs->description }}
                            </div>
                        </div>
                        <div class="inner-box">
                           
                            @isset($AboutUs->facts)
                                
                            @foreach ($AboutUs->facts as $fact )
                            
                            <div class="content-box">
                                <span>{{ $fact['number']  }}</span>
                                <h6 class="title">{{ $fact['title'] }}</h6>
                            </div>
                            @endforeach
                            @endisset
                           

                        </div>
                        <div class="btn-box">
                            <a href="page-about.html" class="theme-btn-v2">البدء <i
                                    class="btn-icon far fa-arrow-left-long btn-icon me-1 font-size-18"></i></a>
                            <div class="contact-btn">
                                <i class="flaticon-telephone-1"></i>
                                <span>اتصل بنا</span>
                                <h6 class="title">{{ $AboutUs->phone }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</div>

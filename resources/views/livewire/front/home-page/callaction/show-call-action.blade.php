<div>


    @if (isset($callAction))
        <section class="contact-banner pt-0">
            <div class="auto-container">
                <div class="outer-box"
                    style="padding: 55px 100px;
            background-image: url('{{ asset($callAction->sectionImage->url) }}');
            background-repeat: no-repeat;
            background-size: cover;
            -o-object-fit: cover;
            object-fit: cover;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;">
                    <h3 class="title">{{ $callAction->title }} </h3>

                    @if (isset($callAction->phone) & ($callAction->phone != null))
                        <a href="tel:{{ $callAction->phone }}" class="theme-btn-v2">{{ $callAction->button_title }} <i
                                class="fas fa-phone btn-icon me-1 font-size-18"></i></a>
                    @endif
                    @if (isset($callAction->button_link) & ($callAction->button_link != null))
                        <a href="mailTo:{{ $callAction->button_link }}"
                            class="theme-btn-v2">{{ $callAction->button_title }} <i
                                class="fas fa-envelope btn-icon me-1 font-size-18"></i></a>
                    @endif
                </div>
            </div>
        </section>

    @endif


</div>

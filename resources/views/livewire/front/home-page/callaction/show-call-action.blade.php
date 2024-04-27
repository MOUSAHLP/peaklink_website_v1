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
            position: relative;
            justify-content: space-between;">

                    <style>
                        @media(max-width:768px) {
                            .contact-banner {
                                display: none;
                            }
                        }
                    </style>
                    <h3 class="title">{{ $callAction->title }} </h3>

                    @if (isset($callAction->phone) & ($callAction->phone != null))
                        <a href="tel:{{ $callAction->phone }}" class="theme-btn">{{ $callAction->phone_button_title }}
                            <i class="fas fa-phone me-1 font-size-18"></i></a>
                    @endif
                    @if (isset($callAction->email) & ($callAction->email != null))
                        <a href="mailTo:{{ $callAction->email }}" class="theme-btn">{{ $callAction->email_button_title }}
                            <i class="fas fa-envelope me-1 font-size-18"></i></a>
                    @endif
                </div>
            </div>
        </section>

    @endif


</div>

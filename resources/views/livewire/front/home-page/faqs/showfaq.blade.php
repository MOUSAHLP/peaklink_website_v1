<div>


    @if (isset($Faqs))

        <section class="faqs-section">
            <div class="auto-container">
                <div class="row">

                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image-box">
                                <figure class="image overlay-anim"><img src="{{ asset('storage/' . $Faqs->image) }}" alt>
                                </figure>

                                <figure class="image overlay-anim">
                                    <x-curator-glider :media="$Faqs->image" :alt="'FAQ'" />
                                </figure>

                            </div>
                        </div>
                    </div>

                    <div class="faq-column col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="inner-column">
                            <div class="sec-title light">
                                <h2 class="title">
                                    @lang('home/faq.see_faq')
                                </h2>
                            </div>
                            <ul class="accordion-box wow fadeInRight">


                                @if (isset($Faqs->questions) && $Faqs->questions != '')

                                    @foreach ($Faqs->questions as $faq)
                                        @if ($loop->first)
                                            <li class="accordion block active-block">
                                                <div class="acc-btn active">{{ $faq['question'] }}<div
                                                        class="icon fa fa-angle-down"></div>
                                                </div>
                                                <div class="acc-content current">
                                                    <div class="content">
                                                        <div class="text">
                                                            {{ $faq['answer'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @else
                                            <li class="accordion block">
                                                <div class="acc-btn">{{ $faq['question'] }}<div
                                                        class="icon fa fa-angle-down"></div>
                                                </div>
                                                <div class="acc-content">
                                                    <div class="content">
                                                        <div class="text">
                                                            {{ $faq['answer'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach






                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif

</div>

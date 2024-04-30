<div>


    @if (isset($Faqs))

        <section class="faqs-section">
            <div class="auto-container">
                <div class="row">

                    <div class="faq-column col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="inner-column">
                            <div class="sec-title light">
                                <h2 class="title">
                                    @lang('home/faq.see_faq')
                                </h2>
                            </div>
                            <ul class="accordion-box wow fadeInRight">
                                @foreach ($Faqs as $Faq)
                                    @if ($loop->first)
                                        <li class="accordion block active-block">
                                            <div class="acc-btn active">{{ $Faq->question }}<div
                                                    class="icon fa fa-angle-down"></div>
                                            </div>
                                            <div class="acc-content current">
                                                <div class="content">
                                                    <div class="text">
                                                        {{ $Faq->answer }}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li class="accordion block">
                                            <div class="acc-btn">{{ $Faq->question }}<div class="icon fa fa-angle-down">
                                                </div>
                                            </div>
                                            <div class="acc-content">
                                                <div class="content">
                                                    <div class="text">
                                                        {{ $Faq->answer }}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @script
            <script>
                if ($(".accordion-box").length) {
                    $(".accordion-box").on("click", ".acc-btn", function() {
                        var outerBox = $(this).parents(".accordion-box");
                        var target = $(this).parents(".accordion");
                        if ($(this).hasClass("active") !== true) {
                            $(outerBox).find(".accordion .acc-btn").removeClass("active ");
                        }
                        if ($(this).next(".acc-content").is(":visible")) {
                            return false;
                        } else {
                            $(this).addClass("active");
                            $(outerBox).children(".accordion").removeClass("active-block");
                            $(outerBox)
                                .find(".accordion")
                                .children(".acc-content")
                                .slideUp(300);
                            target.addClass("active-block");
                            $(this).next(".acc-content").slideDown(300);
                        }
                    });
                }
            </script>
        @endscript
    @endif

</div>

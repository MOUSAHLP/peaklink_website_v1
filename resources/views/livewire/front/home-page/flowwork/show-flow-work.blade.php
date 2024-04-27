<div>


    @if (isset($FlowWork) & ($FlowWork->count() > 0))

        <section class="process-section" dir={{ app()->getlocale() == 'ar' ? 'rtl' : 'ltr' }}>
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>
                        @lang('home/workflow.our_workflow')
                    </h2>
                </div>
                <div class="row">



                    @foreach ($FlowWork as $Flow)
                        <div class="process-block col-lg-3 col-sm-6">
                            <div class="inner-box">
                                <div class="icon-box">
                                    {{-- <i class="flaticon-creativity-1"></i> --}}
                                    @svg($Flow['image'], [
                                        'style' => 'width: 50px;height: 50px;',
                                    ])
                                    {{-- <x-curator-glider :media="$Flow["image"]" :alt="$Flow["title"]"/> --}}
                                </div>
                                <div class="content-box">
                                    <h4 class="title">
                                        @if (isset($Flow['title']))
                                            {{ $Flow['title'] }}
                                        @endif
                                    </h4>
                                    <div class="text">
                                        @if (isset($Flow['short_description']))
                                            {{ $Flow['short_description'] }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>

    @endif


</div>

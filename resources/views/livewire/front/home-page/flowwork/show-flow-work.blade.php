<div>


    @if (isset($FlowWork) & ($FlowWork->count() > 0))

        <section class="process-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>عملية العمل لدينا</h2>
                </div>
                <div class="row">

                    @foreach (array_reverse($FlowWork->toArray()) as $Flow)
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
                                    <h4 class="title">{{ $Flow['title'][app()->getlocale()] }}</h4>
                                    <div class="text">{{ $Flow['short_description'][app()->getlocale()] }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>

    @endif


</div>

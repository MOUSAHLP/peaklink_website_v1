<div>
    

    @if(isset($FlowWork) & $FlowWork->count() > 0)
        
    <section class="process-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>عملية العمل لدينا</h2>
            </div>
            <div class="row">

                @foreach ($FlowWork as $Flow )
                    
                <div class="process-block col-lg-3 col-sm-6">
                    <div class="inner-box">
                        <div class="icon-boxs">
                            {{-- <i class="flaticon-creativity-1"></i> --}}
                            <x-curator-glider :media="$Flow->image" :alt="$Flow->title"/>
                        </div>
                        <div class="content-box">
                            <h4 class="title">{{ $Flow->title }}</h4>
                            <div class="text">{{ $Flow->short_description }}</div>
                        </div>
                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </section>

    @endif
    

</div>

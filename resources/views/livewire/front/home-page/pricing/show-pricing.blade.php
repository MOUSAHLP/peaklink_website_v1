<div>
    


    @if(isset($pricings) & $pricings->count() > 0)
        
    
        <section class="pricing-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>تصميم المواقع و <br>حزم التطوير</h2>
                </div>
                <div class="row">
    
                    @foreach ($pricings as $Getpricing )
                    @if (isset($Getpricing->pricing) )
                    @foreach ($Getpricing->pricing  as $pricing )
                        
                    <div class="pricing-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="upper-box">
                                <span>{{ $pricing['planName'] }}</span>
                                <div class="content-box">
                                    <h2 class="title">{{ $pricing['planPrice'] }}</h2>
                                    <div class="text"> <br> {{ $pricing['PlanTime'] }}</div>
                                </div>
                            </div>
                            <div class="text v2">{{ $pricing['planDesc'] }}</div>
                            <div class="list-sec">
                                @if(isset($pricing['planfeatires']))
                                    
                                <ul class="list">
                                    @foreach ($pricing['planfeatires'] as  $planfeatires )

                                    @if($planfeatires['status'] == true)
                                    <li><i class="fa-solid fa-circle-check text-success"></i>{{ $planfeatires['feature'] }}</li>
                                    @else
                                    <li><i class=" fas fa-xmark"></i>{{ $planfeatires['feature'] }}</li>
                                    
                                    @endif
                                        
                                    @endforeach
                           
                                </ul>

                                @endif
                                <a href="page-pricing.html" class="theme-btn-v2">اختر الحزمة<i
                                        class="far fa-arrow-left-long btn-icon me-1 font-size-18"></i></a>
                            </div>
                        </div>
                    </div>


                    @endforeach
                    @endif
                    @endforeach
    
                
                </div>
            </div>
        </section>
        
    @endif


</div>

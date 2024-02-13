<div>
   

        
    
    <section class="choose-us-section">
        <div class="auto-container">
            <div class="row">

                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title light">
                            <h2>{{$WhyChooseOurService->title }}</h2>
                            <div class="text">
                                {{$WhyChooseOurService->description }}
                            </div>
                        </div>
                        @if(isset($WhyChooseOurService->features))
                        <div class="list-sec">

                            @php $sections = 0 ; @endphp
                            @foreach ($WhyChooseOurService->features as  $feature)
                            @php  $sections++ ;   @endphp
                              @if( $sections % 2 == 0 )
                              <ul class="list">

                                  <li><i class="fa-solid fa-circle-check"></i>
                                
                                    {{ $feature['title'] }}
                                </li>
                                
                              </ul>
                                
                              @else
                              
                              <ul class="list">
                                <li><i class="fa-solid fa-circle-check"></i>
                                
                                    {{ $feature['title'] }}
                                </li>

                              @endif  
                            @endforeach
                            
                            
                            
                        </div>
                        @endif

                        @if(isset($WhyChooseOurService->facts))
                            
                        <div class="row">

                            @foreach ($WhyChooseOurService->facts as $fact)
                                
                            <div class="choose-block col-xl-6 col-lg-12 col-md-6 my-2">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <i class="flaticon-title"></i>
                                    </div>
                                    <h6 class="title">{{ $fact['title'] }}</h6>
                                </div>
                            </div>

                            @endforeach

                           
                        </div>

                        @endif
                    </div>
                </div>

                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image overlay-anim"><a href="page-about.html"><img
                                        src="{{ asset('storage/'. $WhyChooseOurService->image) }}" alt></a></figure>
                                        <div class="exp-box bounce-y">
                                @if(isset($WhyChooseOurService->years_of_experience))
                                <h6 class="title">{{ $WhyChooseOurService->years_of_experience }}+</h6>
                                   
                                @endif           
                                @if(isset($WhyChooseOurService->title_experience))
                                <div class="text">{{ $WhyChooseOurService->title_experience }}</div> 
                                @endif           
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</div>

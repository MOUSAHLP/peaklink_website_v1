<div>
    
    @if(isset($Projects) & $Projects->count() > 0)
    
        <section class="project-section">
            <div class="auto-container">
                <div class="sec-title">
                    <h2> حديثاً <br>المشاريع المنجزة</h2>
                    <div class="text">لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم
                        نشأت بالفعل، وسأعرض لك التفاصيل </div>
                </div>
                <div class="slider-btn">
                    <button class="next-btn"><span><i
                                class="fa-regular fa-arrow-right-long btn-icon"></i></span></button>
                    <button class="prev-btn"><span><i
                                class="fa-regular fa-arrow-right-long btn-icon"></i></span></button>
                </div>
            </div>
            <div class="row project-slider-rtl">
    
                @foreach ($Projects as $Project )
                    
                <div class="project-block col-lg-3 col-md-6">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image overlay-anim"><a href="page-project-details.html">
                                <x-curator-glider :media="$Project->image" :alt="$Project->title"/>
                            </a></figure>
                            <figure class="image-2"><a href="page-project-details.html">

                            <x-curator-glider :media="$Project->image" :alt="$Project->title"/>

                            
                            </a></figure>
                        </div>
                        <div class="content-box">
                            <span>{{ $Project->categories->title  }}</span>
                            <h6 class="title"><a href="page-project-details.html">{{ $Project->title  }}</a></h6>
                        </div>
                    </div>
                </div>
    
    
                @endforeach
    
            </div>
        </section>
        
        
    @endif

</div>
